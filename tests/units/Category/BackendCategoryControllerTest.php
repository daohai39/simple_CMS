<?php

use App\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Yajra\Datatables\Datatables;

class BackendCategoryControllerTest extends TestCase
{
	use DatabaseTransactions, DatabaseMigrations;

    /**
     * @test
     */
    public function method_index_should_receive_ajax_request_for_datatable_listing()
    {
        $expected = $this->mock('Yajra\Datatables\Datatables');

        $mock = $this->mock('App\Contracts\DataTables\CategoryDataTableInterface');
        $mock->shouldReceive('getRootData')->once()->andReturn($expected);

        $this->withServerVariables(['HTTP_X-Requested-With' => 'XMLHttpRequest']);
        $response = $this->route('GET', 'admin.category.index');

        $this->assertResponseOk()->assertTrue($response->getOriginalContent() instanceof Datatables);
    }

    /**
     * @test
     */
    public function method_create_should_receive_empty_ajax_request_to_select_roots_categories()
    {
        $expected = $this->mock('\Illuminate\Contracts\Pagination\LengthAwarePaginator');

        $mock = $this->mock('App\Contracts\Repositories\CategoryRepositoryInterface');
        $mock->shouldReceive('paginateRoots')->once()->andReturn($expected);

        $this->withServerVariables(['HTTP_X-Requested-With' => 'XMLHttpRequest']);
        $this->route('GET', 'admin.category.create');

        $this->assertResponseOk()->assertTrue($this->response->getOriginalContent() instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator);
    }

    /**
     * @test
     */
    public function method_create_should_receive_ajax_request_with_input_query_for_selecting_root_category()
    {
        $expected = $this->mock('\Illuminate\Contracts\Pagination\LengthAwarePaginator');

        $mock = $this->mock('App\Contracts\Repositories\CategoryRepositoryInterface');
        $mock->shouldReceive('paginateNameLike')->once()->andReturn($expected);

        $this->withServerVariables(['HTTP_X-Requested-With' => 'XMLHttpRequest']);
        $this->route('GET', 'admin.category.create', ['q' => 'something']);

        $this->assertResponseOk()->assertTrue($this->response->getOriginalContent() instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator);
    }


    /**
     * @test
     */
    public function method_show_should_receive_existing_id_and_pass()
    {
    	// Arrange
    	$expected = factory(App\Category::class)->create([ 'id' => 1, 'name' => 'Indoor' ]);

        $mock = $this->mock('App\Contracts\Repositories\CategoryRepositoryInterface');
        $mock->shouldReceive('find')->with($expected->id)->once()->andReturn($expected);

    	// Act
        $this->route('GET', 'admin.category.show', ['id' => $expected->id]);

        //Assert
        $this->assertResponseOk()->assertViewHas(['category'])->assertTrue(!! $this->response->original->category);
    }

    /**
     * @test
     */
    public function method_show_should_abort_404()
    {
        $notExistedId = 1;
        // Act
        $this->route('GET', 'admin.category.show', ['id' => $notExistedId]);
        //Assert
        $this->assertResponseStatus(404);
    }

    /**
     * @test
     */
    public function method_show_should_receive_ajax_request_for_datatable_getting_children_data()
    {
        // Arrange
        $expected = factory(App\Category::class)->create([ 'id' => 1, 'name' => 'Indoor' ]);

        $mock = $this->mock('App\Contracts\DataTables\CategoryDataTableInterface');
        $mock->shouldReceive('getChildrenData')->with($expected->id)->once();

        $this->withServerVariables(['HTTP_X-Requested-With' => 'XMLHttpRequest']);
        $this->route('GET', 'admin.category.show', ['id' => $expected->id]);

        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function method_show_should_receive_ajax_request_for_datatable_getting_children_data_but_fail_and_abort_404()
    {
        $notExistedId = 1;

        $this->withServerVariables(['HTTP_X-Requested-With' => 'XMLHttpRequest']);
        $this->route('GET', 'admin.category.show', ['id' => $notExistedId]);

        $this->assertResponseStatus(404);
    }


    /**
     * @test
     */
    public function method_store_should_pass()
    {
        //Arrange
        $attributes = [ 'name' => 'Indoor', 'parent_id' => 2];

        $expected = factory(App\Category::class)->create($attributes);

        $mock = $this->mock('App\Contracts\Services\CategoryAppServiceInterface');
        $mock->shouldReceive('create')->with($attributes)->once()->andReturn($expected);

        //Act
        $this->withoutMiddleware();
        $this->route('POST', 'admin.category.store', $attributes);

        //Assert
        $this->assertRedirectedToRoute('admin.category.show', ['id' => $expected->id]);
    }

}
