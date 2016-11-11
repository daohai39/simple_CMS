<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contracts\Repositories\PostRepositoryInterface;

class PostController extends Controller
{

    protected $posts;

    public function __construct(PostRepositoryInterface $posts)
    {	
    	$this->posts = $posts;
    }

	public function index()
	{
		$post = $this->posts->paginate();
		return view('frontend.post.index',['post' => $post]);
	}

	public function show($post_slug)
	{
		$post = $this->posts->findBySlug($post_slug);
		if($post)
		{
			return view('frontend.post.show',['post' => $post]);
		}
		return abort(404);
	}		

}
