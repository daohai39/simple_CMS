<?php

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Traits\ExecuteCommandTrait;
use App\Jobs\Product\CreateProduct;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class ProductSeeder extends Seeder
{
    use ExecuteCommandTrait;

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
<<<<<<< HEAD
        $this->makeProducts(200);
=======
        $this->makeProducts();
>>>>>>> 56590c9d242e300e030ae5c1d881e335f37724a3
    }

    private function makeProducts($total = 30)
    {
        for($i = 0; $i < $total; $i ++) {
<<<<<<< HEAD
            $category = null;
            do {
                $category = App\Category::inRandomOrder()->first();
            } while(! $category->isCategorizable);

=======
>>>>>>> 56590c9d242e300e030ae5c1d881e335f37724a3
            $this->executeCommand(new CreateProduct([
                'id' => (string) Uuid::uuid4(),
                'name' => $this->faker->words(3, true),
                'code' => $this->faker->postcode,
                'author' => $this->faker->name,
<<<<<<< HEAD
                'category_id' => $category->id,
=======
                'category_id' => App\Category::inRandomOrder()->first()->id,
>>>>>>> 56590c9d242e300e030ae5c1d881e335f37724a3
                'featured' => $this->faker->randomElement([true, false]),
                'description' => $this->faker->paragraphs(3, true),
                'tags' => $this->faker->words(rand(0, 10)),
            ]));
        }
    }
}
