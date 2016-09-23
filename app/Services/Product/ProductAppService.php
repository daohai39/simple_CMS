<?php
namespace App\Services\Product;

use App\Product;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Services\ProductAppServiceInterface;
use App\Contracts\Validators\ProductValidatorInterface;

class ProductAppService implements ProductAppServiceInterface
{
	private $products;
    private $validator;

	public function __construct(ProductRepositoryInterface $products, ProductValidatorInterface $validator)
	{
		$this->products = $products;
        $this->validator = $validator;
	}

	public function create(array $attributes)
	{
        $this->validator->validate('create', $attributes);
		return Product::create($attributes);
	}

    public function update($id, array $attributes)
    {
        $this->validator->validate('update', $attributes);
        $product = $this->products->find($id);
        return $product->update($attributes);
    }

    public function delete($id)
    {
        $product = $this->products->find($id);
        return $product->delete();
    }
}
