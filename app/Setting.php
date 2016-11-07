<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    const TYPE_TEXT = 'text';
    const TYPE_TEXTAREA = 'textarea';

    protected $fillable = ['value'];
}
