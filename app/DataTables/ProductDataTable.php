<?php
namespace App\DataTables;

use App\Product;
use App\Contracts\DataTables\ProductDataTableInterface;

class ProductDataTable extends AbstractDataTable implements ProductDataTableInterface
{
    public function __construct()
    {
        $this->resource = 'product';
    }

    public function getData($columns = ['*'])
    {
        $products = Product::select($columns);
        return self::of($products)->hasActions(['update', 'delete'])->make();
    }
}
