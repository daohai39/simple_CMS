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
        return self::of($posts)
        ->addColumn('featured', function($post) {
            if($post->featured)
                return '<span class="label label-success">Featured</span>';
            else
                return '<span class="label label-default">Non-featured</span>';
        })
        ->addColumn('status', function($post) {
            if($post->status == Post::STATUS_PUBLISH)
                return '<span class="label label-success">Published</span>';
            else
                return '<span class="label label-warning">Draft</span>';
        })
        ->hasActions(['update', 'delete'])->make();
    }
}
