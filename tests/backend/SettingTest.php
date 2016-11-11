<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class SettingTest extends AdminTestCase
{
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        \Artisan::call('db:seed', ['--class' => 'SettingSeeder']);
    }

    /** @test */
    public function it_can_show_list()
    {
        $this->visitRoute('admin.setting.index')
            ->see('Settings')
            ->get(route('admin.setting.index'), ['HTTP_X-Requested-With' => 'XMLHttpRequest'])
            ->seeJsonStructure([
                'data' => [ '*' => ['id', 'name', 'actions'] ]
            ]);
    }


    /** @test */
    public function it_can_update()
    {
        $update = App\Setting::inRandomOrder()->first();

        $this->put(route('admin.setting.update', ['id' => $update->id]), [ 'value' => 'Value updated'])
            ->assertRedirectedTo( route('admin.setting.edit', ['id' => $update->id]) )
            ->assertSessionHas('flash_notification.message', 'Edited Successfully');
    }

}
