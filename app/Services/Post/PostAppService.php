<?php
namespace App\Services\Post;

use App\Post;
use App\Contracts\Repositories\PostRepositoryInterface;
use App\Contracts\Services\PostAppServiceInterface;
use App\Contracts\Validators\PostValidatorInterface;

class PostAppService implements PostAppServiceInterface
{
	private $posts;
    private $validator;

	public function __construct(PostRepositoryInterface $posts, PostValidatorInterface $validator)
	{
		$this->posts = $posts;
        $this->validator = $validator;
	}

	public function create(array $attributes)
	{
        $this->validator->validate('create', $attributes);
        $attributes['featured'] = ($attributes['featured'] == 'on') ? true : false;
        $attributes['status'] = ($attributes['status'] == 'on') ? Post::STATUS_PUBLIC : Post::STATUS_DRAFT;
		return Post::create($attributes);
	}

    public function update($id, array $attributes)
    {
        $post = $this->posts->find($id);
        $this->validator->validate('update', $attributes, $id);
        $attributes['featured'] = ($attributes['featured'] == 'on') ? true : false;
        $attributes['status'] = ($attributes['status'] == 'on') ? Post::STATUS_PUBLIC : Post::STATUS_DRAFT;
        $post->update($attributes);
        return $post;
    }

    public function delete($id)
    {
        $post = $this->posts->find($id);
        return $post->delete();
    }
}
