<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class BackendCategoryControllerTest extends TestCase
{
	use DatabaseTransactions, DatabaseMigrations;

    /**
     * @test
     */
    public function method_show_should_pass()
    {
    	// Arrange
    	$expected = factory(App\Category::class)->create([
            'id' => 1,
            'name' => 'Indoor'
        ]);

        $mock = Mockery::mock('App\Contracts\Repositories\CategoryRepositoryInterface');
        $mock->shouldReceive('find')->with($expected->id)->once()->andReturn($expected);
        $this->app->instance('App\Contracts\Repositories\CategoryRepositoryInterface', $mock);

    	// Act
        $this->route('GET', 'admin.category.show', ['id' => $expected->id]);

        //Assert
        $this->assertResponseOk()
        	 ->assertViewHas(['category'])
             ->assertTrue($this->response->original->category instanceof App\Category);
    }

    /**
     * @test
     */
    public function method_show_should_abort_404()
    {
        // Act
        $this->route('GET', 'admin.category.show', ['id' => 1]);
        //Assert
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

        $mock = Mockery::mock('App\Contracts\Services\CategoryAppServiceInterface');
        $mock->shouldReceive('create')->with($attributes)->once()->andReturn($expected);
        $this->app->instance('App\Contracts\Services\CategoryAppServiceInterface', $mock);

        //Act
        $this->withoutMiddleware();
        $this->route('POST', 'admin.category.store', $attributes);

        //Assert
        $this->assertRedirectedToRoute('admin.category.show', ['id' => $expected->id]);
    }

}
