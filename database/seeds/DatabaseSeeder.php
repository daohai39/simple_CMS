<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Eloquent::reguard();

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(DesignerSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ProjectSeeder::class);
    }
}
