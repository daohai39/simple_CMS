<?php
namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Ramsey\Uuid\Uuid;

class Category extends Model
{
    use NodeTrait, Sluggable;

    public $incrementing = false;
    protected $fillable = ['id', 'name'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getIsCategorizableAttribute($value)
    {
        if(! $this->descendants->isEmpty()) {
            return false;
        }
        return true;
    }
}
