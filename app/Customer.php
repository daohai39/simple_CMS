<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Customer extends Model
{
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'email', 'phone', 'address'];


    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function ($designer) {
            if(! $designer->id)
                $designer->id = Uuid::uuid4()->toString();
        });
    }
}
