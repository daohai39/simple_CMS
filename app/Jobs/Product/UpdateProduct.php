<?php

namespace App\Jobs\Product;

use App\Contracts\Repositories\CategoryRepositoryInterface;
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
        'author' => 'required | min:3',
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
    public function handle(ProductRepositoryInterface $products, CategoryRepositoryInterface $categories)
    {
        $category = $categories->find($this->attributes['category_id']);
        $product = $products->find($this->id);

        $product->category()->associate($category);
        $product->update($this->attributes);

        $product->setTags($this->attributes['tags']);
        $product->attachImages($this->attributes['images_id']);
    }
}
