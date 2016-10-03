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
            'name' => 'about-meta-description',
            'value' => 'Thong tin lien he',
            'type' => 'text',
        ])->save();

        factory(App\Setting::class)->make()->fill([
            'name' => 'Logo',
            'value' => 'link/to/logo',
            'type' => 'text',
        ])->save();
        
        factory(App\Setting::class)->make()->fill([
            'name' => 'Phone',
            'value' => '0123456789',
            'type' => 'number',
        ])->save();

        factory(App\Setting::class)->make()->fill([
            'name' => 'Hotline',
            'value' => '0123456789',
            'type' => 'number',
        ])->save();

        factory(App\Setting::class)->make()->fill([
            'name' => 'product-meta-description',
            'value' => 'Danh muc san pham',
            'type' => 'text',
        ])->save();

        factory(App\Setting::class)->make()->fill([
            'name' => 'meta-title',
            'value' => 'Decoks',
            'type' => 'text',
        ])->save();

        factory(App\Setting::class)->make()->fill([
            'name' => 'meta-description',
            'value' => 'Thiet ke noi ngoai that',
            'type' => 'text',
        ])->save();

        factory(App\Setting::class)->make()->fill([
            'name' => 'About',
            'value' => 'About here',
            'type' => 'textarea',
        ])->save();

        factory(App\Setting::class)->make()->fill([
            'name' => 'Footer',
            'value' => 'Footer here',
            'type' => 'textarea',
        ])->save();
    }
}
