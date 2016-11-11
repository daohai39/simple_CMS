<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Eloquent\CategoryRepository;


class CategoryController extends Controller
{
	protected $categories;

	public function __construct(CategoryRepository $categories){
		$this->categories = $categories;
	}

	public function show($slug){
	 	$products = $this->category->findBySlug($slug)->load('products');
	 	return $products;
	}
}