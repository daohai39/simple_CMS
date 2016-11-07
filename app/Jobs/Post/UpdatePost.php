<?php

namespace App\Jobs\Post;

use App\Post;
use App\Contracts\Repositories\PostRepositoryInterface;
use Illuminate\Bus\Queueable;

class UpdatePost
{
    use Queueable;

    public $id;
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
    public function __construct($id, array $attributes)
    {
        $this->id = $id;
        $this->attributes = array_merge($this->attributes, $attributes);

        // Add unique rule
        $this->rules['title'] = $this->rules['title'].",{$id}";
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PostRepositoryInterface $posts)
    {
        $post = $posts->find($this->id);

        $post->setTags($this->attributes['tags']);
        $post->attachImages($this->attributes['images_id']);
        $post->update($this->attributes);
    }
}
