<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Eloquent\ProductRepository;

class ProductController extends Controller
{	
	protected $products;

	public function __construct(ProductRepository $products)
	{
		$this->products = $products;
	}

	public function index(){
		return $this->products->paginate();
	}
}
