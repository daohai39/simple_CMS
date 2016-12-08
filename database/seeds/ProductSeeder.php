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
        $this->makeProducts(200);

        $featured = App\Product::inRandomOrder()->limit(9)->get()->filter(function ($item, $key) {
            $item->featured = true;
            $item->save();
        });
    }

    private function makeProducts($total = 30)
    {
        for($i = 0; $i < $total; $i ++) {
            $category = null;
            do {
                $category = App\Category::inRandomOrder()->first();
            } while(! $category->isCategorizable);

            $this->executeCommand(new CreateProduct([
                'id' => (string) Uuid::uuid4(),
                'name' => $this->faker->words(3, true),
                'code' => $this->faker->postcode,
                'designer_id' => App\Designer::inRandomOrder()->first()->id,
                'category_id' => $category->id,
                'featured' => false,
                'description' => $this->faker->paragraphs(3, true),
                'tags' => $this->faker->words(rand(0, 10)),
            ]));
        }
    }
}
