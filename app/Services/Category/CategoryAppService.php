<?php
namespace App\Services\Category;

use App\Category;
use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Services\CategoryAppServiceInterface;

class CategoryAppService implements CategoryAppServiceInterface
{
	private $categories;

	public function __construct(CategoryRepositoryInterface $categories)
	{
		$this->categories = $categories;
	}

	public function create(array $attributes)
	{
		return Category::create($attributes);
	}
}
