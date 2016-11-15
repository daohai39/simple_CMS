<?php

namespace App\Jobs\Slider;

use App\Contracts\Repositories\SliderRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateSlider
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
    public function handle(SliderRepositoryInterface $sliders)
    {
        $slider = $sliders->find($this->id);
        $slider->update($this->attributes);
        $slider->attachImage($this->attributes['image_id']);
    }
}
