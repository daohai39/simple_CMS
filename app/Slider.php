<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Slider extends Model
{
    use Mediable;

    public $incrementing = false;
    protected $fillable = ['id', 'url', 'heading', 'description'];
    protected $attributes = [
        'heading' => null,
        'description' => null,
    ];

    public function images()
    {
        return $this->morphToMany(Image::class, 'mediable', 'mediables', 'mediable_id', 'media_id')
            ->where('aggregate_type', Image::TYPE_IMAGE)
            ->withPivot('tag', 'order')
            ->orderBy('order');
    }

    public function attachImage($images_id)
    {
        $current = $this->firstMedia('slider');
        if($current) {
            $this->detachMediaTags('slider');
        }

        $this->attachMedia($images_id, 'slider');
    }
}
