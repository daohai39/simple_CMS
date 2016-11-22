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
		$posts = $this->posts->published()->paginate();
		return view('frontend.post.index',['posts' => $posts]);
	}

	public function show($post_slug)
	{
		$post = $this->posts->findBySlug($post_slug);
		if($post) {
            $featuredPosts = $this->posts->published()->featured()->limit(3)->get();
			return view('frontend.post.show', compact('post', 'featuredPosts'));
		}
		return abort(404);
	}

}
