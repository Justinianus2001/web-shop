<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use App\Models\ProductType;
use App\Models\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // $this->registerPolicies();

        Passport::routes();

        Passport::tokensCan([
            'user' => 'User Type',
            'admin' => 'Admin User Type',
        ]);
        
        view()->composer('header', function($view) {
            $type_product = ProductType::all();
            $view->with('type_product', $type_product);
        });

        view()->composer('header', function($view) {
            $type_product = ProductType::all();
            if (Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['type_product', $type_product, 'cart' => Session::get('cart'),
                    'product_cart' => $cart->items, 'total_price' => $cart->totalPrice,
                    'total_quantity' => $cart->totalQty]);
            }
        });

        view()->composer('page.checkout', function($view) {
            if (Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => Session::get('cart'), 'product_cart' => $cart->items,
                    'total_price' => $cart->totalPrice, 'total_quantity' => $cart->totalQty]);
            }
        });

        view()->composer('page.product_grid', function($view) {
            $type_product = ProductType::all();
            $view->with('type_product', $type_product);
        });

        view()->composer('page.product_list', function($view) {
            $type_product = ProductType::all();
            $view->with('type_product', $type_product);
        });
    }
}
