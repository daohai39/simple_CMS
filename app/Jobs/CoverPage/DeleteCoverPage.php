<?php

namespace App\Jobs\CoverPage;

use App\Contracts\Repositories\CoverPageRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteCoverPage implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

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
    public function handle(CoverPageRepositoryInterface $coverPages)
    {
        $coverPages->find($this->id)->delete();
    }
}
