<?php
namespace App\Services\Category;

use App\Category;
use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Services\CategoryAppServiceInterface;
use App\Contracts\Validators\CategoryValidatorInterface;

class CategoryAppService implements CategoryAppServiceInterface
{
	private $categories;
    private $validator;

	public function __construct(CategoryRepositoryInterface $categories, CategoryValidatorInterface $validator)
	{
		$this->categories = $categories;
        $this->validator = $validator;
	}

	public function create(array $attributes)
	{
        $this->validator->validate('create', $attributes);
		return Category::create($attributes);
	}

    public function update($id, array $attributes)
    {
        $this->validator->validate('update', $attributes);
        $category = $this->categories->find($id);
        return $category->update($attributes);
    }

    public function delete($id)
    {
        $category = $this->categories->find($id);
        return $category->delete();
    }
}
