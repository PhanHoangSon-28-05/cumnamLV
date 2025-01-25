<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\LengthAwarePaginator;

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
        $this->app->singleton(
            \App\Repositories\Client\ClientRepositoryInterface::class,
            \App\Repositories\Client\ClientRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ProductHome\ProductHomeRepositoryInterface::class,
            \App\Repositories\ProductHome\ProductHomeRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Checkouts\CheckoutRepositoryInterface::class,
            \App\Repositories\Checkouts\CheckoutRepository::class
        );
        $this->app->singleton(
            \App\Repositories\CheckoutProducts\CheckoutProductRepositoryInterface::class,
            \App\Repositories\CheckoutProducts\CheckoutProductRepository::class
        );
        $this->app->singleton(
            \App\Repositories\CheckoutProductItems\CheckoutProductItemRepositoryInterface::class,
            \App\Repositories\CheckoutProductItems\CheckoutProductItemRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // \URL::forceScheme('https');

        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page'): LengthAwarePaginator {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage)->values(),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}
