<?php
namespace App;

use Plank\Mediable\Media as Mediable;

class Media extends Mediable
{
    const IMAGE_DEFAULT = 'gallery';
    const IMAGE_THUMBNAIL = 'thumbnail';

    protected $appends = ['url', 'isThumbnail'];


    public function getUrlAttribute($value)
    {
        return route('image', ['path' => $this->getDiskPath()]);
    }

    public function getIsThumbnailAttribute($value)
    {
        return $this->join('mediables', 'media.id', '=', 'mediables.media_id')
                    ->where('media.id', '=', $this->id)
                    ->where('media.aggregate_type', '=', self::TYPE_IMAGE)
                    ->where('mediables.tag', '=', self::IMAGE_THUMBNAIL)->exists();
    }
}
