<?php
namespace App\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use App\Services\CurrencyService;
use App\Models\Currency;

class CurrenciesServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(CurrencyService::class, function ($app) {
            return new CurrencyService(new Currency());
        });
    }
}
