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
		$category = Category::create($attributes);
        if( ! empty($attributes['parent_id']) ) {
            $parent = $this->categories->find($attributes['parent_id']);
            $category->parent()->associate($parent);
        }
        $category->save();
        return $category;
	}

    public function update($id, $attributes)
    {
        $this->validator->validate('update', $attributes);
        $category = $this->categories->find($id);
        if( ! empty($attributes['parent_id']) ) {
            $parent = $this->categories->find($attributes['parent_id']);
            $category->parent()->associate($parent);
        } else {
            $category->parent()->dissociate();
        }
        $category->update($attributes);
        return $category;
    }

    public function delete($id)
    {
        $category = $this->categories->find($id);
        return $category->delete();
    }
}
