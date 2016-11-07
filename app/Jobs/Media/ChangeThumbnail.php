<?php

namespace App\Jobs\Media;

use App\Image;
use App\Contracts\Repositories\MediaRepositoryInterface;

use Illuminate\Bus\Queueable;

class ChangeThumbnail
{
    use Queueable;

    public $attributes;
    public $rules = [
        'image_id' => 'required | exists:media,id',
        'item_id' => 'required',
        'resource' => 'required'
    ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($attributes)
    {
        $this->attributes = $attributes;

        $this->rules['item_id'] = $this->rules['item_id']."| exists:{$this->attributes['resource']}s,id";
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MediaRepositoryInterface $medias)
    {
        $resource = ucfirst($this->attributes['resource']);
        $newThumbnail = $medias->find($this->attributes['image_id']);

        $itemRepository = app('App\Contracts\Repositories\\'.$resource.'RepositoryInterface');
        $item = $itemRepository->find($this->attributes['item_id']);

        if( $oldThumbnail = $item->firstMedia(Image::IMAGE_THUMBNAIL) ) {
            if($oldThumbnail->id == $newThumbnail->id) {
                $item->detachMedia($oldThumbnail, Image::IMAGE_THUMBNAIL);
                $item->attachMedia($oldThumbnail, Image::IMAGE_DEFAULT);
            } else {
                $item->detachMedia($oldThumbnail, Image::IMAGE_THUMBNAIL);
                $item->attachMedia($oldThumbnail, Image::IMAGE_DEFAULT);

                $item->detachMedia($newThumbnail, Image::IMAGE_DEFAULT);
                $item->attachMedia($newThumbnail, Image::IMAGE_THUMBNAIL);
            }
        } else {
            $item->detachMedia($newThumbnail, Image::IMAGE_DEFAULT);
            $item->attachMedia($newThumbnail, Image::IMAGE_THUMBNAIL);
        }
    }
}
