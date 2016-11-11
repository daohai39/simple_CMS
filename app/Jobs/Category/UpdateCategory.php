<?php
namespace App\Jobs\Category;

use App\Contracts\Repositories\CategoryRepositoryInterface;

use Illuminate\Bus\Queueable;

class UpdateCategory
{
    use Queueable;

    public $id;
    public $attributes = [
        'parent_id' => null,
    ];

    public $rules = [
        'name' => 'required | min:3 | unique:categories,name',
        'parent_id' => 'nullable | exists:categories,id'
    ];

    public function __construct($id, array $attributes)
    {
        $this->id = $id;
        $this->attributes = array_merge($this->attributes, $attributes);

        // unique validation
        $this->rules['name'] = $this->rules['name'].",{$id}";
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CategoryRepositoryInterface $categories)
    {
        $category = $categories->find($this->id);

        if($parent_id = $this->attributes['parent_id']) {
            $parent = $categories->find($parent_id);
            $category->parent()->associate($parent);
        } else {
            $category->saveAsRoot();
        }
        $category->update($this->attributes);
    }
}
