<?php
namespace App\Repositories\Eloquent;

use App\Post;
use App\Contracts\Repositories\PostRepositoryInterface;

class PostRepository extends AbstractRepository implements PostRepositoryInterface
{
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }

    public function featured()
    {
        return $this->model()->featured();
    }

    public function findBySlug($post_slug)
    {
        return $this->model()->where('slug',$post_slug)->first();
    }
}
