<?php
namespace App;

use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;
use Ramsey\Uuid\Uuid;

class Designer extends Model
{
    use Mediable, HasImages;

    public $incrementing = false;
    protected $fillable = ['id', 'name', 'facebook', 'email', 'phone', 'description'];

    protected $attributes = [
        'facebook' => 'https://www.facebook.com/',
        'email' => '',
        'phone' => '',
        'description' => '',
    ];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($designer) {
            if(! $designer->id)
                $designer->id = Uuid::uuid4()->toString();
        });
    }
}
