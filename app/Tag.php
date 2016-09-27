<?php
namespace App;

use Cartalyst\Tags\IlluminateTag;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends IlluminateTag
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
