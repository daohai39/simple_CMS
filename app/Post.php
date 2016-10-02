<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;

class Post extends Model implements TaggableInterface
{
    use Sluggable, TaggableTrait;

    const STATUS_DRAFT = 'DRAFT';
    const STATUS_PUBLISH = 'PUBLISH';
    const STATUSES = [ self::STATUS_DRAFT, self::STATUS_PUBLISH ];

    protected $fillable = ['title', 'meta_title', 'description', 'meta_description', 'featured', 'status', 'content'];

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
                'source' => 'title'
            ]
        ];
    }

    public function getMetaTitleAttribute($value)
    {
        if(! $value) {
            return $this->attributes['title'];
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
