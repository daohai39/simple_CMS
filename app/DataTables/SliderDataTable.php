<?php
namespace App\DataTables;

use App\Slider;
use App\Contracts\DataTables\SliderDataTableInterface;

class SliderDataTable extends AbstractDataTable implements SliderDataTableInterface
{
    public function __construct()
    {
        $this->resource = 'slider';
    }

    public function getData($columns = ['*'])
    {
        $sliders = Slider::select($columns);
        return self::of($sliders)->hasActions(['update', 'delete'])->make();
    }
}
