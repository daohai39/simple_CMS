<?php
namespace App\Repositories\Eloquent;

use App\Tag;
use App\Contracts\Repositories\TagRepositoryInterface;

class TagRepository extends AbstractRepository implements TagRepositoryInterface
{
	public function __construct(Tag $tag)
	{
		parent::__construct($tag);
	}

	public function paginateNameLike($name, $perpage = null, $columns = ['*'])
	{
		return $this->paginateWhere(['name', 'like', "%{$name}%"], $perpage, $columns);
	}
}
