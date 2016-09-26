<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 30)->make()->each(function($product) {
            $product->category()->associate(App\Category::inRandomOrder()->where('parent_id', '<>', null)->first());
            $product->save();
        });
    }
}
