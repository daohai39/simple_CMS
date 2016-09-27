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
        $this->bindDataTables();
        $this->bindValidators();
    }


    /**
     * Method use to bind repositories to IoC
     * @return void
     */
    protected function bindRepositories()
    {
        $repositories = [
            'App\Contracts\Repositories\CategoryRepositoryInterface' => 'App\Repositories\Eloquent\CategoryRepository',
            'App\Contracts\Repositories\ProductRepositoryInterface' => 'App\Repositories\Eloquent\ProductRepository',
            'App\Contracts\Repositories\TagRepositoryInterface' => 'App\Repositories\Eloquent\TagRepository',
        ];

        foreach($repositories as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    protected function bindAppServices()
    {
        $services = [
            'App\Contracts\Services\CategoryAppServiceInterface' => 'App\Services\Category\CategoryAppService',
            'App\Contracts\Services\ProductAppServiceInterface' => 'App\Services\Product\ProductAppService',
            'App\Contracts\Services\TagAppServiceInterface' => 'App\Services\Tag\TagAppService'
        ];

        foreach($services as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    protected function bindDataTables()
    {
        $services = [
            'App\Contracts\DataTables\CategoryDataTableInterface' => 'App\DataTables\CategoryDataTable',
            'App\Contracts\DataTables\ProductDataTableInterface' => 'App\DataTables\ProductDataTable',
            'App\Contracts\DataTables\TagDataTableInterface' => 'App\DataTables\TagDataTable'
        ];

        foreach($services as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    protected function bindValidators()
    {
        $services = [
            'App\Contracts\Validators\CategoryValidatorInterface' => 'App\Validators\CategoryValidator',
            'App\Contracts\Validators\TagValidatorInterface' => 'App\Validators\TagValidator',
            'App\Contracts\Validators\ProductValidatorInterface' => 'App\Validators\ProductValidator'
        ];

        foreach($services as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
