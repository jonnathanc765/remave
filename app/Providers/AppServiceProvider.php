<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Configuration;
use App\Product;
use View;
use Illuminate\Support\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Carbon::setLocale(config('app.locale'));

        
        $meta = Configuration::all();
        $productsFooter = Product::with('images')->inRandomOrder()->take(6)->get();
        $seo = Configuration::where('name', 'like', '%meta%')->get();
        
        View::share('productsFooter',$productsFooter);  
        View::share('meta', $meta);  
        View::share('seo', $seo);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
