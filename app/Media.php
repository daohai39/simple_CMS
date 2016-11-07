<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Media as Mediable;
use Ramsey\Uuid\Uuid;

class Media extends Mediable
{
    public $incrementing = false;
    protected $table = 'media';

    public static function boot() {
        // extends boot method from Model
        // avoid file deletion when delete model
        Model::boot();
        static::creating(function ($media) {
            $media->id = Uuid::uuid4()->toString();
        });
    }
}
