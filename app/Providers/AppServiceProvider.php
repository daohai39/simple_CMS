<?php

namespace App\Providers;

use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\Facades\Queue;
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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindRepositories();
        $this->bindDataTables();

        $this->registerGlide();

        // Register custom command bus & pipe through
        $this->app->singleton('CommandBus', function() {
            return app(Dispatcher::class)->pipeThrough([
                \App\Jobs\Middlewares\ValidatingMiddleware::class,
                \App\Jobs\Middlewares\DatabaseTransactionsMiddleware::class,
                \App\Jobs\Middlewares\LoggingMiddleware::class,
            ]);
        });

        // Register view composer for frontend
        view()->composer('frontend.*', function ($view) {
            $view->with('settings', app('App\Contracts\Repositories\SettingRepositoryInterface')->all()->mapWithKeys(function ($setting) {
                return [$setting['key'] => $setting['value']];
            }));
        });
    }


    protected function registerGlide()
    {
        return $this->app->bind('League\Glide\Server', function($app) {
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
                    'marked' => [
                        'mark' => 'mark.png',
                        'markw' => '100w',
                        'markfit' => 'crop'
                    ]
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
            'App\Contracts\Repositories\SettingRepositoryInterface' => 'App\Repositories\Eloquent\SettingRepository',
            'App\Contracts\Repositories\DesignerRepositoryInterface' => 'App\Repositories\Eloquent\DesignerRepository',
            'App\Contracts\Repositories\ProjectRepositoryInterface' => 'App\Repositories\Eloquent\ProjectRepository',
            'App\Contracts\Repositories\StageRepositoryInterface' => 'App\Repositories\Eloquent\StageRepository',
            'App\Contracts\Repositories\CustomerRepositoryInterface' => 'App\Repositories\Eloquent\CustomerRepository',
            'App\Contracts\Repositories\SliderRepositoryInterface' => 'App\Repositories\Eloquent\SliderRepository',
            'App\Contracts\Repositories\CoverPageRepositoryInterface' => 'App\Repositories\Eloquent\CoverPageRepository',
        ];

        foreach($repositories as $abstract => $concrete) {
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
            'App\Contracts\DataTables\SettingDataTableInterface' => 'App\DataTables\SettingDataTable',
            'App\Contracts\DataTables\DesignerDataTableInterface' => 'App\DataTables\DesignerDataTable',
            'App\Contracts\DataTables\ProjectDataTableInterface' => 'App\DataTables\ProjectDataTable',
            'App\Contracts\DataTables\CustomerDataTableInterface' => 'App\DataTables\CustomerDataTable',
            'App\Contracts\DataTables\SliderDataTableInterface' => 'App\DataTables\SliderDataTable',
            'App\Contracts\DataTables\CoverPageDataTableInterface' => 'App\DataTables\CoverPageDataTable',
        ];

        foreach($services as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
