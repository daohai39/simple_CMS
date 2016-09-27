<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
     protected $fillable = ['title', 'src', 'role'];


    public function imageable()
    {
        return $this->morphTo();
    }

    public function scopeFeatured($query)
    {
        $query->where('role', 'featured');
    }

    public function scopeNormal($query)
    {
        $query->whereNull('role')->orWhere('role', '');
    }

    public function setFeaturedAttribute($value)
    {
        if ($value) {
            $this->attributes['role'] = 'featured';
            return;
        }
        $this->attributes['role'] = '';
    }
}
