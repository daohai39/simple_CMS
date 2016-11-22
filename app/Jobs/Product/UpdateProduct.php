<?php

namespace App\Jobs\Product;

use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Repositories\DesignerRepositoryInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;
use Illuminate\Bus\Queueable;

class UpdateProduct
{
    use Queueable;

    public $id;
    public $attributes = [
        'tags' => [],
        'images_id' => [],
    ];

    public $rules = [
        'name' => 'required | min:3 | unique:products,name',
        'code' => 'required | min:1',
        'designer_id' => 'required | exists:designers,id',
        'category_id' => 'required | exists:categories,id',
        'featured' => 'required | boolean',
    ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, array $attributes)
    {
        $this->id = $id;
        $this->attributes = array_merge($this->attributes, $attributes);

        // Add unique rules
        $this->rules['name'] = $this->rules['name'].",{$id}";
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ProductRepositoryInterface $products, CategoryRepositoryInterface $categories, DesignerRepositoryInterface $designers)
    {
        $category = $categories->find($this->attributes['category_id']);
        $designer = $designers->find($this->attributes['designer_id']);

        $product = $products->find($this->id);
        $product->category()->associate($category);
        $product->designer()->associate($designer);
        $product->update($this->attributes);

        $product->setTags($this->attributes['tags']);
        $product->syncImages($this->attributes['images_id']);
    }
}
