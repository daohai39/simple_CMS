<?php

namespace App\Jobs\CoverPage;

use App\CoverPage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateCoverPage
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $attributes;
    public $rules = [];

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $coverPage = CoverPage::create($this->attributes);
        $coverPage->attachImage($this->attributes['image_id']);
    }
}
