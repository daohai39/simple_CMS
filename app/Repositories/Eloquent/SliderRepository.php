<?php
namespace App\Repositories\Eloquent;

use App\Slider;
use App\Contracts\Repositories\SliderRepositoryInterface;

class SliderRepository extends AbstractRepository implements SliderRepositoryInterface
{
    public function __construct(Slider $slider)
    {
        parent::__construct($slider);
    }
}
