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
<<<<<<< HEAD
        $this->call(CustomerSeeder::class);
        $this->call(ProjectSeeder::class);
=======
>>>>>>> 56590c9d242e300e030ae5c1d881e335f37724a3
    }
}
