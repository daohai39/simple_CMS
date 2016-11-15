<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Repositories\CoverPageRepositoryInterface;
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
    protected $covers;

    public function __construct(SliderRepositoryInterface $sliders, ProductRepositoryInterface $products,
                                PostRepositoryInterface $posts, CoverPageRepositoryInterface $covers)
    {
        $this->products = $products;
        $this->sliders = $sliders;
        $this->posts = $posts;
        $this->covers = $covers;
    }

    public function index()
    {
        $sliders = $this->sliders->all();
        $covers = $this->covers->all();
        $featuredProducts = $this->products->featured()->limit(9)->get();
        $featuredPosts = $this->posts->featured()->limit(9)->get();
        // dd($covers);
        return view('frontend.home', compact('sliders', 'featuredProducts', 'featuredPosts', 'covers'));
    }
}
