<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;
use Plank\Mediable\Mediable;
use App\Traits\HasImages;
use App\Traits\VnDateTrait;

class Product extends Model implements TaggableInterface
{
    use Sluggable, TaggableTrait, Mediable, HasImages, VnDateTrait;

    public $incrementing = false;

    protected $fillable = ['id', 'name', 'code', 'description', 'meta_title', 'meta_description', 'featured'];
    protected $casts = [
        'featured' => 'boolean',
    ];
    protected $attributes = [
        'featured'          => false,
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeFeatured($query)
    {
        return $query->whereFeatured(true);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function designer()
    {
        return $this->belongsTo(Designer::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $this->getDate($value);
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
