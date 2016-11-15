<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class CoverPage extends Model
{
    use Mediable;

    public $incrementing = false;
    protected $fillable = ['id', 'url', 'content', 'heading'];
    protected $attributes = [
        'url' => null,
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
        $current = $this->firstMedia('cover');
        if($current) {
            $images_id = array_filter($images_id, function($id) use ($current) {
                return $id !== $current->id;
            });

            $this->detachMediaTags('cover');
        }

        $this->attachMedia($images_id, 'cover');
    }
}
