<?php

namespace App\Jobs\CoverPage;

use App\Contracts\Repositories\CoverPageRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateCoverPage
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $id;
    public $attributes;
    public $rules;

    public function __construct($id, array $attributes)
    {
        $this->id = $id;
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CoverPageRepositoryInterface $coverPages)
    {
        $coverPage = $coverPages->find($this->id);
        $coverPage->update($this->attributes);
        $coverPage->attachImage($this->attributes['image_id']);
    }
}
