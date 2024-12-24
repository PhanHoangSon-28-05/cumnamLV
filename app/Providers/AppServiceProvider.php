<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Color\ColorRepositoryInterface::class,
            \App\Repositories\Color\ColorRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Order\OrderRepositoryInterface::class,
            \App\Repositories\Order\OrderRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Headers\HeaderRepositoryInterface::class,
            \App\Repositories\Headers\HeaderRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Footers\FooterRepositoryInterface::class,
            \App\Repositories\Footers\FooterRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Product\ProductRepositoryInterface::class,
            \App\Repositories\Product\ProductRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Post\PostRepositoryInterface::class,
            \App\Repositories\Post\PostRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ItemOrder\ItemRepositoryInterface::class,
            \App\Repositories\ItemOrder\ItemRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Sliders\SliderRepositoryInterface::class,
            \App\Repositories\Sliders\SliderRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Logos\LogooRepositoryInterface::class,
            \App\Repositories\Logos\LogoRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // \URL::forceScheme('https');
    }
}
