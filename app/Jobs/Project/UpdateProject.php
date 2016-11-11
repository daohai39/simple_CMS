<?php

namespace App\Jobs\Project;

use App\Contracts\Repositories\CustomerRepositoryInterface;
use App\Contracts\Repositories\ProjectRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateProject
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $id;
    public $attributes = [
        'images_id' => [],
        'documents_id' => [],
        'customer_id' => null,
    ];
    public $rules = [
        'name' => 'required|min:3',
    ];



    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, array $attributes)
    {
        $this->id = $id;
        $this->attributes = array_merge($this->attributes, $attributes);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ProjectRepositoryInterface $projects, CustomerRepositoryInterface $customers)
    {
        $project = $projects->find($this->id);
        $project->update($this->attributes);

        if($customer_id = $this->attributes['customer_id']) {
            $customer = $customers->find($customer_id);
            $project->customer()->associate($customer)->save();
        } else {
            $project->customer()->dissociate()->save();
        }
    }
}
