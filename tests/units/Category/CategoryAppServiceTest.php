<?php

use App\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CategoryAppServiceTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations;


    public function test_create_action()
    {
        $attributes = [
            'id' => 1,
            'name' => 'category name',
        ];
        $expected = factory(Category::class)->make($attributes);

        $mock = Mockery::mock('App\Contracts\Repositories\CategoryRepositoryInterface');

        $appService = new \App\Services\Category\CategoryAppService($mock);
        $result = $appService->create($attributes);

        $this->assertEquals($result->id, $expected->id);
        $this->assertEquals($result->name, $expected->name);
    }

    
}
