<?php
namespace App;

class Image extends Media
{
    const IMAGE_DEFAULT = 'gallery';
    const IMAGE_THUMBNAIL = 'thumbnail';

    protected $appends = ['url', 'isThumbnail'];


    public function getUrlAttribute($value)
    {
        if($this->aggregate_type == self::TYPE_IMAGE && $this->disk == 'image')
            return route('image', ['path' => $this->getDiskPath()]);

        return $this->getUrl();
    }

    public function getIsThumbnailAttribute($value)
    {
        return $this->join('mediables', 'media.id', '=', 'mediables.media_id')
                    ->where('media.id', '=', $this->id)
                    ->where('media.aggregate_type', '=', self::TYPE_IMAGE)
                    ->where('mediables.tag', '=', self::IMAGE_THUMBNAIL)->exists();
    }
}
