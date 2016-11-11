<?php
namespace App\Traits;

use App\Image;

trait HasImages
{
    public function images()
    {
        return $this->morphToMany(Image::class, 'mediable', 'mediables', 'mediable_id', 'media_id')
            ->where('aggregate_type', Image::TYPE_IMAGE)
            ->withPivot('tag', 'order')
            ->orderBy('order');
    }

    public function syncImages($images_id)
    {
        if($thumbnail = $this->thumbnail) {
            $images_id = array_filter($images_id, function($id) use ($thumbnail) {
                return $id !== $thumbnail->id;
            });
        }

        return $this->syncMedia($images_id, Image::IMAGE_DEFAULT);
    }

    public function getThumbnailAttribute($value)
    {
        return $this->firstMedia(Image::IMAGE_THUMBNAIL);
    }
}
