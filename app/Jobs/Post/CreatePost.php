<?php
namespace App\Jobs\Post;

use App\Contracts\Repositories\PostRepositoryInterface;
use App\Post;
use Illuminate\Bus\Queueable;

class CreatePost
{
    use Queueable;

    public $attributes = [
        'tags' => [],
        'images_id' => [],
    ];

    public $rules = [
        'title' => 'required | min:3 | unique:posts,title',
        'content' => 'required | min:3',
        'featured' => 'required | boolean',
        'status' => 'required | in:'.Post::STATUS_DRAFT.','.Post::STATUS_PUBLISH,
    ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PostRepositoryInterface $posts)
    {
        $post =  Post::create($this->attributes);
        $post->setTags($this->attributes['tags']);
        $post->syncImages($this->attributes['images_id']);
    }
}
