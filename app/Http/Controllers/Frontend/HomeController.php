<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Repositories\PostRepositoryInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Repositories\SliderRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $sliders;
    protected $products;
    protected $posts;

    public function __construct(SliderRepositoryInterface $sliders, ProductRepositoryInterface $products, PostRepositoryInterface $posts)
    {
        $this->products = $products;
        $this->sliders = $sliders;
        $this->posts = $posts;
    }

    public function index()
    {
        $sliders = $this->sliders->all();
        $featuredProducts = $this->products->featured()->get();
        $featuredPosts = $this->posts->featured()->limit(3)->get();

        // dd(compact('sliders'));
        return view('frontend.home', compact('sliders', 'featuredProducts', 'featuredPosts'));
    }
}
