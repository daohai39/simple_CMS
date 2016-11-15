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

    public function featured()
    {
        return $this->model()->featured();
    }

    public function findBySlug($product_slug)
    {
        return $this->model()->where('slug',$product_slug)->first();
    }

    public function paginateByCategorySlug($category_slug, $perpage = 10)
    {
        return $this->model()->whereHas('category', function($query) use ($category_slug)
        {
            $query->where('slug', '=',$category_slug);
        })->paginate($perpage);
    }
}
