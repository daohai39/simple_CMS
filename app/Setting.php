<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Setting extends Model
{
    use Mediable;

    const TYPE_TEXT = 'text';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_IMAGE = 'image';

    protected $fillable = ['value'];
    protected $attributes = [
        'value' => null,
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
        $tag = "image_{$this->id}";
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
}
