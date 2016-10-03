<?php
namespace App\DataTables;

use App\Setting;
use App\Contracts\DataTables\SettingDataTableInterface;

class SettingDataTable extends AbstractDataTable implements SettingDataTableInterface
{
    public function __construct()
    {
        $this->resource = 'setting';
    }

    public function getData($columns = ['*'])
    {
        $settings = Setting::select($columns);
        return self::of($settings)->hasActions(['update'])->make();
    }
}
