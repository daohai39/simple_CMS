<?php

namespace App\Jobs\Customer;

use App\Contracts\Repositories\CustomerRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateCustomer
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $id;
    public $attributes;
    public $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'required|min:7',
        'address' => 'required',
    ];

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
    public function handle(CustomerRepositoryInterface $customers)
    {
        $customer = $customers->find($this->id);
        $customer->update($this->attributes);
    }
}
