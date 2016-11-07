<?php

use App\Jobs\Category\CreateCategory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Ramsey\Uuid\Uuid;
use Illuminate\Contracts\Bus\Dispatcher;

class CategoryTest extends AdminTestCase
{
    use WithoutMiddleware;

    protected $dispatcher;
    protected $mockCategoryId;
    protected $categories;

    public function setUp()
    {
        parent::setUp();

        $this->dispatcher = $this->app->make(Dispatcher::class);
        $this->mockCategoryId = $this->mockCategory();
        $this->categories = app('App\Contracts\Repositories\CategoryRepositoryInterface');
    }

    private function mockCategory()
    {
        $id = (string) Uuid::uuid4();
        $this->dispatcher->dispatch(new CreateCategory([ 'id' => $id, 'name' => 'Test Category']));
        return $id;
    }

    /** @test */
    public function it_can_show_list()
    {
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
        $this->post(route('admin.category.store'), [ 'name' => 'Test Category 2', 'parent_id' => $this->mockCategoryId ])
            ->assertSessionHas('flash_notification.message', 'Created Successfully');
    }

    /** @test */
    public function it_can_update()
    {
        $this->put(route('admin.category.update', ['id' => $this->mockCategoryId]), [ 'name' => 'Test Category updated'])
            ->assertRedirectedToRoute('admin.category.edit', ['id' => $this->mockCategoryId] )
            ->assertSessionHas('flash_notification.message', 'Edited Successfully');
    }

    /** @test */
    public function it_can_delete()
    {
        $this->delete(route('admin.category.destroy', ['id' => $this->mockCategoryId]))
            ->assertRedirectedToRoute('admin.category.index')
            ->assertSessionHas('flash_notification.message', 'Deleted Successfully');
    }

    /** @test */
    public function it_requires_fields()
    {
        // Enable middleware for using session
        $this->enableMiddleware();

        $this->visitRoute('admin.category.create')
            ->press('Create')
            ->see('The name field is required.');
    }

    /** @test */
    public function it_has_fields_constraint()
    {
        // Enable middleware for using session
        $this->enableMiddleware();

        $this->visitRoute('admin.category.create')
            ->type('C', 'name')
            ->press('Create')
            ->see('The name must be at least 3  characters.');
    }
}
