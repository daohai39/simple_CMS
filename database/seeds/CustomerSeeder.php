<?php

use App\Jobs\Customer\CreateCustomer;
use App\Traits\ExecuteCommandTrait;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class CustomerSeeder extends Seeder
{
    use ExecuteCommandTrait;

    private $faker;

    public function __construct(Faker\Generator $faker)
    {
        $this->faker = $faker;
    }


    public function run()
    {
        $this->makeCustomers();
    }

    public function makeCustomers($total = 30)
    {
        for($i = 0; $i < $total; $i ++) {
            $this->executeCommand(new CreateCustomer([
                'id' => Uuid::uuid4()->toString(),
                'name' => $this->faker->name,
                'email' => $this->faker->safeEmail,
                'phone' => $this->faker->phoneNumber,
                'address' => $this->faker->address,
            ]));
        }
    }
}
