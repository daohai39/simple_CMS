<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends AdminTestCase
{
    use WithoutMiddleware;

    /** @test */
    public function it_can_show_list()
    {
        $product = $this->arrangeProduct();

        $this->visitRoute('admin.product.index')
            ->see('Product')
            ->get(route('admin.product.index'), ['HTTP_X-Requested-With' => 'XMLHttpRequest'])
            ->seeJsonStructure([
                'data' => [ '*' => ['id', 'name', 'actions'] ]
            ]);
    }

    /** @test */
    public function it_can_create()
    {
        $category = factory(App\Category::class)->create();

        $this->post(route('admin.product.store'), [
            'name' => 'Product name',
            'code' => '12345',
            'author' => 'Author name',
            'category_id' => $category->id,
            'tags' => ['foo', 'bar', 'baz'],
            'description' => 'Product description',
            'featured' => 'on',
        ])
            ->assertRedirectedTo( route('admin.product.edit', ['id' => 1]) )
            ->assertSessionHas('flash_notification.message', 'Created Successfully');
    }

    /** @test */
    public function it_can_update()
    {
        $update = $this->arrangeProduct();

        $this->put(route('admin.product.update', ['id' => $update->id]), [
            'name' => 'Product name updated',
            'code' => '12345',
            'author' => 'Author name',
            'category_id' => $update->category->id,
            'tags' => ['foo', 'bar', 'baz'],
            'description' => 'Product description',
            'featured' => 'on',
        ])
            ->assertRedirectedTo( route('admin.product.edit', ['id' => $update->id]) )
            ->assertSessionHas('flash_notification.message', 'Edited Successfully');
    }

    /** @test */
    public function it_can_delete()
    {
        $product = $this->arrangeProduct();

        $this->delete(route('admin.product.destroy', ['id' => $product->id]))
            ->assertRedirectedTo( route('admin.product.index'))
            ->assertSessionHas('flash_notification.message', 'Deleted Successfully');
    }

     /** @test */
    public function it_requires_fields()
    {
        // Enable middleware for using session
        $this->enableMiddleware();
        $this->be($this->mockAdmin());

        $this->visitRoute('admin.product.create')
            ->press('Create')
            ->see('The name field is required.')
            ->see('The code field is required.')
            ->see('The author field is required.')
            ->see('The category id field is required.');
    }

    protected function arrangeProduct()
    {
        $category = factory(App\Category::class)->create();
        $product = factory(App\Product::class)->make();
        $product->category()->associate($category)->save();

        return $product;
    }

}
