<?php
namespace App\DataTables;

use App\Designer;
use App\Contracts\DataTables\DesignerDataTableInterface;

class DesignerDataTable extends AbstractDataTable implements DesignerDataTableInterface
{
    public function __construct()
    {
        $this->resource = 'designer';
    }

    public function getData($columns = ['*'])
    {
        $designers = Designer::select($columns);
        return self::of($designers)->hasActions(['update', 'delete'])->make();
    }
}
