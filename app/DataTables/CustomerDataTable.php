<?php
namespace App\DataTables;

use App\Customer;
use App\Contracts\DataTables\CustomerDataTableInterface;

class CustomerDataTable extends AbstractDataTable implements CustomerDataTableInterface
{
    public function __construct()
    {
        $this->resource = 'customer';
    }

    public function getData($columns = ['*'])
    {
        $customers = Customer::select($columns);
        return self::of($customers)->hasActions(['update', 'delete'])->make();
    }
}
