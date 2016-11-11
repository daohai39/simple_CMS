<?php
namespace App\Jobs\Stage;

use App\Contracts\Repositories\StageRepositoryInterface;
use App\Stage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateStage
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $id;
    public $attributes = [
        'images_id' => [],
        'documents_id' => [],
    ];
    public $rules = [
        'name' => 'required|min:3',
        'project_id' => 'required|exists:projects,id',
        'started_at' => 'nullable|date_format:d/m/Y',
        'finished_at' => 'nullable|date_format:d/m/Y|after:started_at',
        'expected_cost' => 'nullable|numeric|min:0',
        'actual_cost' => 'nullable|numeric|min:0',
        'paid' => 'boolean'
    ];

    public function __construct($id, array $attributes)
    {
        $this->id = $id;
        // filter blank before to make sure date & cost not getting database error
        // make it null instead
        $this->attributes = $this->filterBlank(array_merge($this->attributes, $attributes));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(StageRepositoryInterface $stages)
    {
        $stage = $stages->find($this->id);

        $stage->update($this->attributes);
        $stage->syncImages($this->attributes['images_id']);
        $stage->syncDocuments($this->attributes['documents_id']);
    }

    protected function filterBlank(array $array)
    {
        return array_map(function($value) {
           return ($value === '') ? null : $value;
        }, $array);
    }
}
