<?php
namespace App;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use NodeTrait, Sluggable;

    protected $fillable = ['name'];

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
}
