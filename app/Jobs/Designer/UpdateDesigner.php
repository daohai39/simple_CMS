<?php

namespace App\Jobs\Designer;

use App\Contracts\Repositories\DesignerRepositoryInterface;
use Illuminate\Bus\Queueable;

class UpdateDesigner
{
    use Queueable;

    public $id;
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
    public function __construct($id, array $attributes)
    {
        $this->id = $id;
        $this->attributes = $attributes;

        $this->rules['name'] = $this->rules['name'].",{$id}";
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(DesignerRepositoryInterface $designers)
    {
        $designer = $designers->find($this->id);
        $designer->attachImages($this->attributes['images_id']);
        $designer->update($this->attributes);
    }
}
