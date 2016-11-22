<?php

namespace App\Jobs\Slider;

use App\Slider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateSlider
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $attributes;
    public $rules = [
        'image_id' => 'required'
    ];

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
        $slider = Slider::create($this->attributes);
        $slider->attachImage($this->attributes['image_id']);
    }
}
