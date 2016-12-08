<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Slider extends Model
{
    use Mediable;

    public $incrementing = false;
    protected $fillable = ['id', 'url', 'heading', 'heading_size', 'heading_color', 'description', 'description_size', 'description_color'];
    protected $attributes = [
        'heading_size' => '62px',
        'heading_color' => '#fff',
        'description_size' => '14px',
        'description_color' => '#fff',
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
        $tag = "slider_{$this->id}";
        $current = $this->firstMedia($tag);

        if($current && count($images_id) == 1 && $images_id[0] == $current->id) {
            return;
        } else if(count($images_id) > 1){
            $images_id = array_filter($images_id, function($id) use ($current) {
                return $id !== $current->id;
            });
            $this->detachMediaTags($tag);
        }

        $this->attachMedia($images_id, $tag);
    }

    public function getHeadingSizePixelAttribute($value)
    {
        return is_null($this->heading_size) ? "100%" : "{$this->heading_size}px";
    }

    public function getDescriptionSizePixelAttribute($value)
    {
        return is_null($this->description_size) ? "100%" : "{$this->description_size}px";
    }
}
