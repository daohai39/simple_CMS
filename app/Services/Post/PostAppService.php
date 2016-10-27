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

        $attributes['featured'] = isset($attributes['featured']) ? ( ($attributes['featured'] == 'on') ? true : false) : false;
        $attributes['status'] = isset($attributes['status']) ? (($attributes['status'] == 'on') ? Post::STATUS_PUBLISH : Post::STATUS_DRAFT) : Post::STATUS_DRAFT;
        $tags = empty($attributes['tags']) ? [] : $attributes['tags'];
        $images_id = empty($attributes['images_id']) ? [] : $attributes['images_id'];

		$post =  Post::create($attributes);
        $post->setTags($tags);
        $post->syncMedia($images_id, 'gallery');
        return $post;
	}

    public function update($id, array $attributes)
    {
        $this->validator->validate('update', $attributes, $id);

        $attributes['featured'] = isset($attributes['featured']) ? ( ($attributes['featured'] == 'on') ? true : false) : false;
        $attributes['status'] = isset($attributes['status']) ? (($attributes['status'] == 'on') ? Post::STATUS_PUBLISH : Post::STATUS_DRAFT) : Post::STATUS_DRAFT;
        $tags = empty($attributes['tags']) ? [] : $attributes['tags'];
        $images_id = empty($attributes['images_id']) ? [] : $attributes['images_id'];

        $post = $this->posts->find($id);
        $post->setTags($tags);
        $post->syncMedia($images_id, 'gallery');
        return $post->update($attributes);
    }

    public function delete($id)
    {
        $post = $this->posts->find($id);
        return $post->delete();
    }
}
