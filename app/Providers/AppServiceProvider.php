<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        view()->composer('*', function($view) {
            $view->with('categories', Category::all());
        });
        
        view()->composer('*', function($view) {
            $view->with('carts', Cart::where('ip_address', request()->ip())->where('order_id', null)->get());
        });

        Blade::directive('route', function ($expression) {
            return "<?php echo route ($expression); ?>";
        });
    }
}
