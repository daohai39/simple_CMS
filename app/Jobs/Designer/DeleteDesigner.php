<?php

namespace App\Jobs\Designer;

use App\Contracts\Repositories\DesignerRepositoryInterface;
use Illuminate\Bus\Queueable;

class DeleteDesigner
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
    public function handle(DesignerRepositoryInterface $designers)
    {
        $designers->find($this->id)->delete();
    }
}
