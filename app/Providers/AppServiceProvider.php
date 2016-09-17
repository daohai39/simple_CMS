<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindRepositories();
        $this->bindAppServices();
    }


    /**
     * Method use to bind repositories to IoC
     * @return void
     */
    protected function bindRepositories()
    {
        $repositories = [
            'App\Contracts\Repositories\CategoryRepositoryInterface' => 'App\Repositories\Eloquent\CategoryRepository',
        ];

        foreach($repositories as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    protected function bindAppServices()
    {
        $services = [
            'App\Contracts\Services\CategoryAppServiceInterface' => 'App\Services\Category\CategoryAppService'
        ];

        foreach($services as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
