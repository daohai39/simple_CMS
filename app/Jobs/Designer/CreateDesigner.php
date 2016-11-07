<?php

namespace App\Jobs\Designer;

use App\Contracts\Repositories\DesignerRepositoryInterface;
use App\Designer;
use Illuminate\Bus\Queueable;

class CreateDesigner
{
    use Queueable;

    public $attributes = [
        'images_id' => [],
    ];

    public $rules = [
        'name' => 'required | min:3 | unique:designers,name',
    ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(DesignerRepositoryInterface $designers)
    {
        $designer = Designer::create($this->attributes);
        $designer->attachImages($this->attributes['images_id']);
    }
}
