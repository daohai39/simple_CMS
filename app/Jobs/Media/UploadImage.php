<?php
namespace App\Jobs\Media;

use App\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Http\UploadedFile;
use MediaUploader;
use Validator;

class UploadImage
{
    use Queueable;

    public $attributes;
    public $rules = [
        'id' => 'required',
        'file' => 'required'
    ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
        $this->attributes['file'] = $this->upload();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->attributes['file'];
    }

    protected function upload()
    {
        // $this->validateUpload();

        if($this->attributes['file'] instanceof UploadedFile) {
            return $this->uploadFromSource();
        } else {
            return $this->importFromFile();
        }
    }

    protected function importFromFile()
    {
        $file = "{$this->attributes['file']['filename']}.{$this->attributes['file']['extension']}";
        $image = MediaUploader::importPath($this->attributes['file']['disk'], $file);
        $image->id = $this->attributes['id'];
        $image->save();

        return $image;
    }

    protected function uploadFromSource()
    {
        $image =  MediaUploader::fromSource($this->attributes['file'])
                    ->setModelClass(Image::class)
                    ->toDisk('image')
                    ->setAllowedAggregateTypes(['image'])
                    ->upload();

        $image->id = $this->attributes['id'];
        $image->save();

        return $image;
    }

    protected function validateUpload()
    {
        $rules = $this->rules;

        if($this->attributes['file'] instanceof UploadedFile) {
            $rules = array_merge($rules, [
                'file' => 'required|image|max:5000'
            ]);
        }

        Validator::make($this->attributes, $rules)->validate();
    }
}
