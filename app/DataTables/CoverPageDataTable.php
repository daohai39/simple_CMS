<?php
namespace App\DataTables;

use App\CoverPage;
use App\Contracts\DataTables\CoverPageDataTableInterface;

class CoverPageDataTable extends AbstractDataTable implements CoverPageDataTableInterface
{
    public function __construct()
    {
        $this->resource = 'cover-page';
    }

    public function getData($columns = ['*'])
    {
        $coverPages = CoverPage::select($columns);
        return self::of($coverPages)->hasActions(['update', 'delete'])->make();
    }
}
