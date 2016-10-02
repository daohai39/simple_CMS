<?php
namespace App\DataTables;

use App\Post;
use App\Contracts\DataTables\PostDataTableInterface;

class PostDataTable extends AbstractDataTable implements PostDataTableInterface
{
    public function __construct()
    {
        $this->resource = 'post';
    }

    public function getData($columns = ['*'])
    {
        $posts = Post::select($columns);
        return self::of($posts)->hasActions(['update', 'delete'])->make();
    }
}
