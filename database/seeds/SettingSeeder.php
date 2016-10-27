<?php

use Illuminate\Database\Seeder;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Setting::class)->make()->fill([
            'name' => 'Contact',
            'key' => 'contact',
            'value' => 'Thong tin lien he',
            'type' => 'text',
            'default' => true,
        ])->save();

        factory(App\Setting::class)->make()->fill([
            'name' => 'Facebook',
            'key' => 'facebook',
            'value' => 'http://facebook.com',
            'type' => 'text',
            'default' => true,
        ])->save();

        factory(App\Setting::class)->make()->fill([
            'name' => 'Logo',
            'key' => 'logo',
            'value' => 'link/to/logo',
            'type' => 'text',
            'default' => true,
        ])->save();

        factory(App\Setting::class)->make()->fill([
            'name' => 'Phone',
            'key' => 'phone',
            'value' => '0123456789',
            'type' => 'text',
            'default' => true,
        ])->save();

        factory(App\Setting::class)->make()->fill([
            'name' => 'meta-title',
            'key' => 'meta-title',
            'value' => 'Decoks',
            'type' => 'text',
            'default' => true,
        ])->save();

        factory(App\Setting::class)->make()->fill([
            'name' => 'meta-description',
            'key' => 'meta-description',
            'value' => 'Thiet ke noi ngoai that',
            'type' => 'text',
            'default' => true,
        ])->save();

        factory(App\Setting::class)->make()->fill([
            'name' => 'Footer',
            'key' => 'footer',
            'value' => 'Footer here',
            'type' => 'textarea',
            'default' => true,
        ])->save();
    }
}
