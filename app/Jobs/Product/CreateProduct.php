<?php
namespace App\Jobs\Product;

use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Repositories\DesignerRepositoryInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Product;
use Illuminate\Bus\Queueable;

class CreateProduct
{
    use Queueable;

    public $attributes = [
        'tags' => [],
        'images_id' => [],
    ];

    public $rules = [
        'name' => 'required | min:3 | unique:products,name',
        'code' => 'required | min:1 | unique:products,code',
        'designer_id' => 'required | exists:designers,id',
        'category_id' => 'required | exists:categories,id',
        'featured' => 'required | boolean',
    ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CategoryRepositoryInterface $categories, DesignerRepositoryInterface $designers)
    {
        $category = $categories->find($this->attributes['category_id']);
        $designer = $designers->find($this->attributes['designer_id']);

        $product = new Product($this->attributes);
        $product->category()->associate($category);
        $product->designer()->associate($designer);
        $product->save();

        $product->setTags($this->attributes['tags']);
        $product->syncImages($this->attributes['images_id']);
    }
}
