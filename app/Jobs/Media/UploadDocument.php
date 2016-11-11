<?php
namespace App\Jobs\Media;

use App\Document;
use Illuminate\Bus\Queueable;
use Illuminate\Http\UploadedFile;
use MediaUploader;
use Validator;

class UploadDocument
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
        $document = MediaUploader::importPath('document', $file);
        $document->id = $this->attributes['id'];
        $document->save();

        return $document;
    }

    protected function uploadFromSource()
    {
        $document =  MediaUploader::fromSource($this->attributes['file'])
                    ->setModelClass(Document::class)
                    ->toDisk('document')
                    ->setStrictTypeChecking(false)
                    ->setAllowedAggregateTypes([Document::TYPE_PDF, Document::TYPE_DOCUMENT, Document::TYPE_SPREADSHEET])
                    ->upload();

        $document->id = $this->attributes['id'];
        $document->save();

        return $document;
    }

    protected function validateUpload()
    {
        $rules = $this->rules;

        if($this->attributes['file'] instanceof UploadedFile) {
            $rules = array_merge($rules, [
                'file' => 'required'
            ]);
        }

        Validator::make($this->attributes, $rules)->validate();
    }
}
