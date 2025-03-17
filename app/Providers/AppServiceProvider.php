<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use App\Models\Type_Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('header', function ($view) {				
            $categories = Type_Product::all();				
            $view->with('categories', $categories);				
        });				                   
    }
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchData($method, $url, $options = [])
    {
        return $this->client->request($method, $url, $options);
    }
}


