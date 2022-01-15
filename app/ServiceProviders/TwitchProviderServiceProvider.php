<?php


namespace App\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use App\Services\TwitchProvider;
use App\Models\Config;

class TwitchProviderServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(TwitchProvider::class, function ($app) {
            return new TwitchProvider(new Config());
        });

        $this->app->when('App\Http\Controllers\Pages')
            ->needs('App\Interfaces\Service')
            ->give(Pages::class);
    }
}
