<?php
namespace App\DataTables;

use App\Tag;
use App\Contracts\DataTables\TagDataTableInterface;

class TagDataTable extends AbstractDataTable implements TagDataTableInterface
{
    public function __construct()
    {
        $this->resource = 'tag';
    }

    public function getData($columns = ['*'])
    {
        $tags = Tag::select($columns);
        return self::of($tags)->hasActions(['update', 'delete'])->make();
    }
}
