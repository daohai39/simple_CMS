<?php

namespace App\Jobs\Customer;

use App\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateCustomer
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $attributes;
    public $rules = [
        'id' => 'required',
        'name' => 'required|min:3',
        'email' => 'required|email|unique:customers',
        'phone' => 'required|min:7',
        'address' => 'required',
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
        Customer::create($this->attributes);
    }
}
