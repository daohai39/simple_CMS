<?php
namespace App\DataTables;

use App\Category;
use App\Contracts\DataTables\CategoryDataTableInterface;

class CategoryDataTable extends AbstractDataTable implements CategoryDataTableInterface
{
    public function __construct()
    {
        $this->resource = 'category';
    }

    public function getRootData($columns = ['*'])
    {
        $roots = Category::select($columns);
        return self::of($roots)->editColumn('name', function($category) {
            return '<a href="'.route('admin.category.show', $category->id).'">'.$category->name.'</a>';
        })->hasActions(['update', 'delete'])->make();
    }

    public function getChildrenData($id, $columns = ['*'])
    {
        $children = Category::findOrFail($id)->children();
        return self::of($children)->editColumn('name', function($category) {
            return '<a href="'.route('admin.category.show', $category->id).'">'.$category->name.'</a>';
        })->hasActions(['update', 'delete'])->make();
    }
}
