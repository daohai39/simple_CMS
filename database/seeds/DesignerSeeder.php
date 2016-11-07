<?php

use App\Jobs\Designer\CreateDesigner;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class DesignerSeeder extends Seeder
{

    private $faker;

    public function __construct(Faker\Generator $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->makeDesigner();
    }

    private function makeDesigner($total = 30)
    {
        for($i = 0; $i < $total; $i++) {
            dispatch(new CreateDesigner([
                'id'               => Uuid::uuid4(),
                'name'             => $this->faker->name,
                'facebook'         => 'https://www.facebook.com',
                'email'            => $this->faker->safeEmail,
                'phone'            => $this->faker->phoneNumber,
                'description'      => $this->faker->paragraph,
                'images_id'        => [],
            ]));
        }
    }
}
