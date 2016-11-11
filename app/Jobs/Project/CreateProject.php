<?php

namespace App\Jobs\Project;

use App\Contracts\Repositories\CustomerRepositoryInterface;
use App\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateProject
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $attributes = [
        'images_id' => [],
        'documents_id' => [],
        'customer_id' => null,
    ];
    public $rules = [
        'id' => 'required',
        'name' => 'required|min:3',
    ];


    public function __construct(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CustomerRepositoryInterface $customers)
    {
        $project = Project::create($this->attributes);

        if($customer_id = $this->attributes['customer_id']) {
            $customer = $customers->find($customer_id);
            $project->customer()->associate($customer)->save();
        }
    }
}
