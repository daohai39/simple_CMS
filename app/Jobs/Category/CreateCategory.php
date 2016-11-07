<?php
namespace App\Jobs\Category;

use App\Category;
use App\Contracts\Repositories\CategoryRepositoryInterface;

use Illuminate\Bus\Queueable;

class CreateCategory
{
    use  Queueable;

    public $attributes = [
        'parent_id' => null,
    ];

    public $rules = [
        'name' => 'required | min:3 | unique:categories,name',
        'parent_id' => 'nullable | exists:categories,id'
    ];

    public function __construct(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CategoryRepositoryInterface $categories)
    {
        // Create Non Root Category
        if($parent_id = $this->attributes['parent_id']) {
            $parent = $categories->find($parent_id);
            $category = Category::create($this->attributes, $parent);
        }
        // Create Root Category
        else {
            $category = Category::create($this->attributes);
        }
    }
}
