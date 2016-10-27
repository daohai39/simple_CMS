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
        $this->validator->validate('create', $attributes);

        $attributes['featured'] = isset($attributes['featured']) ? ( ($attributes['featured'] == 'on') ? true : false) : false;
        $images_id = empty($attributes['images_id']) ? [] : $attributes['images_id'];
        $tags = empty($attributes['tags']) ? [] : $attributes['tags'];
        $category = $this->categories->find($attributes['category_id']);

		$product =  new Product($attributes);
        $product->category()->associate($category);
        $product->save();
        $product->setTags($tags);
        $product->syncMedia($images_id, 'gallery');

        return $product;
	}

    public function update($id, array $attributes)
    {
        $this->validator->validate('update', $attributes, $id);

        $attributes['featured'] = isset($attributes['featured']) ? ( ($attributes['featured'] == 'on') ? true : false) : false;
        $images_id = empty($attributes['images_id']) ? [] : $attributes['images_id'];
        $tags = empty($attributes['tags']) ? [] : $attributes['tags'];
        $category = $this->categories->find($attributes['category_id']);

        $product = $this->products->find($id);
        $product->category()->associate($category);
        $product->setTags($tags);
        $product->syncMedia($images_id, 'gallery');

        return $product->update($attributes);
    }

    public function delete($id)
    {
        $product = $this->products->find($id);
        return $product->delete();
    }
}
