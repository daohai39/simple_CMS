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

        $this->app->bind('League\Glide\Server', function($app) {
            return \League\Glide\ServerFactory::create([
                'base_url' => 'img',
                'source' => \Storage::disk('image')->getDriver(),
                'cache' => \Storage::disk('image')->getDriver(),
                'cache_path_prefix' => '.cache',
                'response' => new \League\Glide\Responses\LaravelResponseFactory(),

                'max_image_size' => 2000 * 2000,
                'presets' => [
                    'small' => [
                        'w' => 200,
                        'h' => 200,
                        'fit' => 'crop',
                    ],
                    'medium' => [
                        'w' => 600,
                        'h' => 400,
                        'fit' => 'crop',
                    ],
                ],

                'defaults' => [
                    'mark' => 'mark.png',
                    'markw' => '100w',
                    'markfit' => 'crop'
                ],

                'watermarks' => \Storage::disk('source')->getDriver(),
            ]);
        });
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
            'App\Contracts\Repositories\PostRepositoryInterface' => 'App\Repositories\Eloquent\PostRepository',
            'App\Contracts\Repositories\MediaRepositoryInterface' => 'App\Repositories\Eloquent\MediaRepository',
            'App\Contracts\Repositories\SettingRepositoryInterface' => 'App\Repositories\Eloquent\SettingRepository'
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
            'App\Contracts\Services\PostAppServiceInterface' => 'App\Services\Post\PostAppService',
            'App\Contracts\Services\MediaAppServiceInterface' => 'App\Services\Media\MediaAppService',
            'App\Contracts\Services\SettingAppServiceInterface' => 'App\Services\Setting\SettingAppService',
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
            'App\Contracts\DataTables\PostDataTableInterface' => 'App\DataTables\PostDataTable',
            'App\Contracts\DataTables\SettingDataTableInterface' => 'App\DataTables\SettingDataTable'
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
            'App\Contracts\Validators\PostValidatorInterface' => 'App\Validators\PostValidator',
            'App\Contracts\Validators\MediaValidatorInterface' => 'App\Validators\MediaValidator',
            'App\Contracts\Validators\SettingValidatorInterface' => 'App\Validators\SettingValidator'
        ];

        foreach($services as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
