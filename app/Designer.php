<?php
namespace App;

use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Designer extends Model
{
    use Mediable, HasImages;

    protected $fillable = ['name', 'facebook', 'email', 'phone', 'description'];

    protected $attributes = [
        'facebook' => 'https://www.facebook.com/',
        'email' => '',
        'phone' => '',
    ];

    protected $appends = ['thumbnail'];
}
