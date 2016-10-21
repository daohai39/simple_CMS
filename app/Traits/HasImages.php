<?php
namespace App\Traits;

use App\Media;

trait HasImages
{
    public function images()
    {
        return $this->morphToMany(Media::class, 'mediable')
            ->where('aggregate_type', Media::TYPE_IMAGE)
            ->withPivot('tag', 'order')
            ->orderBy('order');
    }

    public function getThumbnailAttribute($value)
    {
        $thumbnail = $this->images()->where('tag', '=', Media::IMAGE_THUMBNAIL)->first();
        if($thumbnail)
            return $thumbnail->url;
    }
}
