<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends AdminTestCase
{
    use WithoutMiddleware;

    /** @test */
    public function it_can_show_list()
    {
        $post = factory(App\Post::class)->create();

        $this->visitRoute('admin.post.index')
            ->see('Post')
            ->get(route('admin.post.index'), ['HTTP_X-Requested-With' => 'XMLHttpRequest'])
            ->seeJsonStructure([
                'data' => [ '*' => ['title', 'actions'] ],
            ]);
    }

    /** @test */
    public function it_can_create()
    {
        $this->post(route('admin.post.store'), [
            'title' => 'post title',
            'content' => 'post content',
            'featured' => 'on',
            'status' => 'on',
        ]);

        $this->assertRedirectedToRoute('admin.post.edit', ['id' => 1])
             ->assertSessionHas('flash_notification.message', 'Created Successfully');
    }

    /** @test */
    public function it_can_update()
    {
        $update = factory(App\Post::class)->create();

        $this->put(route('admin.post.update', ['id' => $update->id]), [
            'title' => 'post title updated',
            'content' => 'post content updated',
            'featured' => 'on',
            'status' => 'on',
        ]);

        $this->assertRedirectedTo( route('admin.post.edit', ['id' => $update->id]) )
             ->assertSessionHas('flash_notification.message', 'Edited Successfully');
    }

    /** @test */
    public function it_can_delete()
    {
        $post = factory(App\Post::class)->create();

        $this->delete(route('admin.post.destroy', ['id' => $post->id]))
            ->assertRedirectedTo( route('admin.post.index'))
            ->assertSessionHas('flash_notification.message', 'Deleted Successfully');
    }

    /** @test */
    public function it_requires_fields()
    {
        // Enable middleware for using session
        $this->enableMiddleware();
        $this->be($this->mockAdmin());

        $this->visitRoute('admin.post.create')
            ->press('Create')
            ->see('The title field is required.')
            ->see('The content field is required.');
    }

     /** @test */
    public function it_has_fields_constraint()
    {
        // Enable middleware for using session
        $this->enableMiddleware();
        $this->be($this->mockAdmin());

        $this->visitRoute('admin.post.create')
            ->type('T', 'title')
            ->type('C', 'content')
            ->press('Create')
            ->see('The title must be at least 3  characters.')
            ->see('The content must be at least 3 characters.');
    }
}
