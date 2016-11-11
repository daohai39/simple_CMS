<?php

namespace App\Jobs\Media;

use App\Contracts\Repositories\MediaRepositoryInterface;
use Illuminate\Bus\Queueable;

class DeleteMedia
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
    public function handle(MediaRepositoryInterface $medias)
    {
        $medias->find($this->id)->delete();
    }
}
