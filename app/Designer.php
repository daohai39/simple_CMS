<?php
namespace App;

use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

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
}
