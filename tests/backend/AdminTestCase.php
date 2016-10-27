<?php

abstract class AdminTestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://decoks.dev/admin';


    public function mock($class)
    {
      $mock = Mockery::mock($class);
      $this->app->instance($class, $mock);
      return $mock;
    }

    public function enableMiddleware()
    {
        return $this->app->instance('middleware.disable', false);
    }

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function setUp()
    {
        parent::setUp();
        \Artisan::call('migrate:refresh');
    }

    public function tearDown()
    {
        Mockery::close();
        $this->clearMedia();
    }

    public function mockAdmin()
    {
        return factory(App\User::class)->create([
            'email' => 'admin@decoks.dev',
            'password' => bcrypt('admin@decoks.dev'),
        ]);
    }

    public function clearMedia()
    {
        foreach(App\Media::all() as $media) {
            // Clear storage after test
            $media->delete();
        }
    }
}
