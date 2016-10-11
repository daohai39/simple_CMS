<?php
namespace App\Services\Product;

use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Services\ProductAppServiceInterface;
use App\Contracts\Validators\ProductValidatorInterface;
use App\Product;
use App\Tag;

class ProductAppService implements ProductAppServiceInterface
{
	private $products;
    private $validator;
    private $categories;

	public function __construct(ProductRepositoryInterface $products, CategoryRepositoryInterface $categories, ProductValidatorInterface $validator)
	{
		$this->products = $products;
        $this->categories = $categories;
        $this->validator = $validator;
	}

	public function create(array $attributes)
	{
        $attributes['featured'] = ($attributes['featured'] == 'on') ? true : false;

        $this->validator->validate('create', $attributes);
		$product =  new Product($attributes);
        $category = $this->categories->find($attributes['category_id']);
        $product->category()->associate($category);
        $product->save();
        $product->tag($attributes['tags']);
        $product->syncMedia($attributes['images_id'], 'gallery');

        return $product;
	}

    public function update($id, array $attributes)
    {
        $attributes['featured'] = ($attributes['featured'] == 'on') ? true : false;

        $product = $this->products->find($id);
        $this->validator->validate('update', $attributes, $id);
        $category = $this->categories->find($attributes['category_id']);
        $product->category()->associate($category);
        $product->tag( $tags = empty($attributes['tags']) ? [] : $attributes['tags'] );
        $product->syncMedia($attributes['images_id'], 'gallery');

        return $product->update($attributes);
    }

    public function delete($id)
    {
        $product = $this->products->find($id);
        return $product->delete();
    }
}
