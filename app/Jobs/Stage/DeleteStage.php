<?php

namespace App\Jobs\Stage;

use App\Contracts\Repositories\StageRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteStage
{
    use InteractsWithQueue, Queueable, SerializesModels;

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
    public function handle(StageRepositoryInterface $stages)
    {
        $stages->find($this->id)->delete();
    }
}
