<?php

namespace App\Jobs\Tag;

use App\Contracts\Repositories\TagRepositoryInterface;

use Illuminate\Bus\Queueable;

class DeleteTag
{
    use Queueable;

    public $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(TagRepositoryInterface $tags)
    {
        $tags->find($this->id)->delete();
    }
}
