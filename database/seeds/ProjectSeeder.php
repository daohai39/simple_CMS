<?php

use App\Jobs\Project\CreateProject;
use App\Jobs\Stage\CreateStage;
use App\Traits\ExecuteCommandTrait;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class ProjectSeeder extends Seeder
{
    use ExecuteCommandTrait;

    private $faker;

    public function __construct(Faker\Generator $faker)
    {
        $this->faker = $faker;
    }

    public function run()
    {
        $this->makeProjects();
    }

    public function makeProjects($total = 30)
    {
        for($i = 0; $i < $total; $i ++) {
            $id = (string) Uuid::uuid4();
            $customer_id = App\Customer::inRandomOrder()->first()->id;

            $this->executeCommand(new CreateProject([
                'id' => $id,
                'name' => $this->faker->words(3, true),
                'customer_id' => $this->faker->randomElement([null, $customer_id]),
                'description' => $this->faker->paragraphs(3, true),
            ]));

            $this->makeStage($id, rand(0, 5));
        }
    }

    public function makeStage($project_id, $total = 4)
    {
        for($i = 0 ; $i < $total; $i ++) {

            $this->executeCommand(new CreateStage([
                'id' => (string) Uuid::uuid4(),
                'project_id' => $project_id,
                'name' => $this->faker->words(3, true),
                'description' => $this->faker->paragraphs(3, true),
                'expected_cost' => $this->faker->randomFloat(3, 0, null),
                'actual_cost' => $this->faker->randomFloat(3, 0, null),
                'paid' => $this->faker->randomElement([true, false]),
            ]));
        }
    }
}
