<?php
namespace App\DataTables;

use App\Category;
use App\Contracts\DataTables\MediaDataTableInterface;

class MediaDataTable extends AbstractDataTable implements MediaDataTableInterface
{
    public function __construct()
    {
        $this->resource = 'image';
    }

}
