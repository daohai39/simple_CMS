<?php
namespace App\Repositories\Eloquent;

use App\Product;
use App\Contracts\Repositories\ProductRepositoryInterface;

class ProductRepository extends AbstractRepository implements ProductRepositoryInterface
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

}
