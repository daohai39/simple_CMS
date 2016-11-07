<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    const UPDATED_AT = null;

    protected $fillable = ['command', 'data'];
    protected $casts = [
        'data' => 'array',
    ];
}
