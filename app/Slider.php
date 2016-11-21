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
        $tag = "slider_{$this->id}";
        $current = $this->firstMedia('cover');

        if($current && count($images_id) == 1 && $images_id[0] == $current->id) {
            return;
        } else if(count($images_id) > 1){
            $images_id = array_filter($images_id, function($id) use ($current) {
                return $id !== $current->id;
            });
            $this->detachMediaTags('cover');
        }

        $this->attachMedia($images_id, 'cover');
    }
}
