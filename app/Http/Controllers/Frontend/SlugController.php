<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Repositories\CategoryRepositoryInterface;


class SlugController extends Controller
{
    protected $products;
    protected $categories;

    public function __construct(ProductRepositoryInterface $products, CategoryRepositoryInterface $categories)
    {
    	$this->products = $products;
        $this->categories = $categories;
    }

    public function index($slug)
    {
        if($product = $this->products->findBySlug($slug)) {
            return view('frontend.product.show', ['product' => $product]);
        } else if($category = $this->categories->findBySlug($slug)) {
            if(! $category->isCategorizable) {
                return view('frontend.product.index', ['category' => $category, 'products' => $category->childrenProducts()->paginate(9)]);
            }

            $products = $this->products->paginateByCategorySlug($slug, 9);
            return view('frontend.product.index', ['category' => $category, 'products' => $products]);
        }
        return abort(404);
    }
}
