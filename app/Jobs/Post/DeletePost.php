<?php

namespace App\Jobs\Post;

use App\Contracts\Repositories\PostRepositoryInterface;
use Illuminate\Bus\Queueable;

class DeletePost
{
    use Queueable;

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PostRepositoryInterface $posts)
    {
        $posts->find($this->id)->delete();
    }
}
