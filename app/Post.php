<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;
use Plank\Mediable\Mediable;
use App\Traits\HasImages;

class Post extends Model implements TaggableInterface
{
    use Sluggable, TaggableTrait, Mediable, HasImages;

    const STATUS_DRAFT = 'DRAFT';
    const STATUS_PUBLISH = 'PUBLISH';
    const STATUSES = [ self::STATUS_DRAFT, self::STATUS_PUBLISH ];

    public $incrementing = false;

    protected $fillable = ['id', 'title', 'content', 'featured', 'status', 'description', 'meta_title', 'meta_description'];
    protected $casts = [
        'featured' => 'boolean',
    ];
    protected $attributes = [
        'featured' => false,
        'status' => self::STATUS_DRAFT,
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
        return str_limit($value, 150);
    }

    public function setMetaDescriptionAttribute($value)
    {
        $this->attributes['meta_description'] = str_limit($value, 150);
    }

}
