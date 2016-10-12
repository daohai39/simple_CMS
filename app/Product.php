<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;
use Plank\Mediable\Mediable;

class Product extends Model implements TaggableInterface
{
    use Sluggable, TaggableTrait, Mediable;

    protected $fillable = ['name', 'code', 'author', 'description', 'meta_title', 'meta_description', 'featured'];

    protected $casts = [
        'featured' => 'boolean',
    ];

    protected $attributes = [
        'featured' => false,
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->morphToMany(Media::class, 'mediable')
            ->where('aggregate_type', Media::TYPE_IMAGE)
            // ->where('tag', '<>', Media::IMAGE_THUMBNAIL)
            ->withPivot('tag', 'order')
            ->orderBy('order');
    }

    public function getMetaTitleAttribute($value)
    {
        if(! $value) {
            return $this->attributes['name'];
        }
        return $value;
    }

    public function getMetaDescriptionAttribute($value)
    {
        if(! $value) {
            return str_limit($this->attributes['description'], 150);
        }
        return $value;
    }

    public function setMetaDescriptionAttribute($value)
    {
        $this->attributes['meta_description'] = str_limit($value, 150);
    }
}
