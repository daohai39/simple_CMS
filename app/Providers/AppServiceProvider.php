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
            'App\Contracts\Repositories\MediaRepositoryInterface' => 'App\Repositories\Eloquent\MediaRepository',
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
            'App\Contracts\Services\TagAppServiceInterface' => 'App\Services\Tag\TagAppService',
            'App\Contracts\Services\MediaServiceInterface' => 'App\Services\Media\MediaService',
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
            'App\Contracts\DataTables\TagDataTableInterface' => 'App\DataTables\TagDataTable',
            'App\Contracts\DataTables\MediaDataTableInterface' => 'App\DataTables\MediaDataTable',
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
            'App\Contracts\Validators\ProductValidatorInterface' => 'App\Validators\ProductValidator',
            'App\Contracts\Validators\MediaValidatorInterface' => 'App\Validators\MediaValidator',
        ];

        foreach($services as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
