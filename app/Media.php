<?php
namespace App;

use Plank\Mediable\Media as Mediable;

class Media extends Mediable
{
    public function getUrlAttribute($value)
    {
        return $this->getUrl();
    }
}
