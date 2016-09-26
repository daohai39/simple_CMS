<?php
namespace App\Repositories\Eloquent;

use App\Category;
use App\Contracts\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
	public function __construct(Category $category)
	{
		parent::__construct($category);
	}

	public function paginateNameLike($name, $perpage = null, $columns = ['*'])
	{
		return $this->paginateWhere(['name', 'like', "%{$name}%"], $perpage, $columns);
	}

	public function paginateRoots($perpage = null, $columns = ['*'])
	{
		return $this->paginateWhere(['parent_id', '=', null], $perpage, $columns);
	}

    public function paginateChildren($perpage = null, $columns = ['*'])
    {
        return $this->paginateWhere(['parent_id', '<>', null], $perpage, $columns);
    }
}
