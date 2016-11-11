<?php
namespace App\Traits;

use Carbon\Carbon;

trait VnDateTrait
{
    public function getDate($value)
    {
        if($value)
            return (new Carbon($value))->format('d/m/Y');
    }

    public function setDate($value)
    {
        if (! empty($value) && is_string($value)) {
            return Carbon::createFromFormat('d/m/Y', $value);
        }
    }
}
