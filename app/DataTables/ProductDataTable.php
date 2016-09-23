<?php
namespace App\DataTables;

use App\Category;
use App\Contracts\DataTables\ProductDataTableInterface;

class ProductDataTable extends AbstractDataTable implements ProductDataTableInterface
{
    public function __construct()
    {
        $this->resource = 'product';
    }

}
