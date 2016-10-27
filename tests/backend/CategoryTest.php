<?php

use App\Validators\CategoryValidator;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CategoryTest extends AdminTestCase
{
    use WithoutMiddleware;

    /** @test */
    public function it_can_show_list()
    {
        $category = factory(App\Category::class)->create();

        $this->visitRoute('admin.category.index')
            ->see('Category')
            ->get(route('admin.category.index'), ['HTTP_X-Requested-With' => 'XMLHttpRequest'])
            ->seeJsonStructure([
                'data' => [ '*' => ['id', 'name', 'parent_id', 'slug', 'actions'] ]
            ]);
    }

    /** @test */
    public function it_can_create()
    {
        $parent = factory(App\Category::class)->create();

        $this->post(route('admin.category.store'), [ 'name' => 'Foooo', 'parent_id' => $parent->id ])
            ->assertRedirectedTo( route('admin.category.edit', ['id' => 2]) )
            ->assertSessionHas('flash_notification.message', 'Created Successfully');
    }

    /** @test */
    public function it_can_update()
    {
        $update = factory(App\Category::class)->create();

        $this->put(route('admin.category.update', ['id' => $update->id]), [ 'name' => 'Foo updated'])
            ->assertRedirectedTo( route('admin.category.edit', ['id' => $update->id]) )
            ->assertSessionHas('flash_notification.message', 'Edited Successfully');
    }

    /** @test */
    public function it_can_delete()
    {
        $category = factory(App\Category::class)->create();

        $this->delete(route('admin.category.destroy', ['id' => $category->id]))
            ->assertRedirectedTo( route('admin.category.index'))
            ->assertSessionHas('flash_notification.message', 'Deleted Successfully');
    }

    /** @test */
    public function it_requires_fields()
    {
        // Enable middleware for using session
        $this->enableMiddleware();
        $this->be($this->mockAdmin());

        $this->visitRoute('admin.category.create')
            ->press('Create')
            ->see('The name field is required.');
    }

    /** @test */
    public function it_has_fields_constraint()
    {
        // Enable middleware for using session
        $this->enableMiddleware();
        $this->be($this->mockAdmin());

        $this->visitRoute('admin.category.create')
            ->type('C', 'name')
            ->press('Create')
            ->see('The name must be at least 3  characters.');
    }
}
