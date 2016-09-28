<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const STATUS_DRAFT = 'DRAFT';
    const STATUS_PUBLIC = 'PUBLIC';

    protected $fillable = ['title', 'content', 'status'];

    public function images()
    {
        return $this->hasMany(Image::class)->where('role', '<>','feature');
    }

    public function featureImage()
    {
        return $this->hasOne(Image::class)->where('role', 'feature');
    }


}
