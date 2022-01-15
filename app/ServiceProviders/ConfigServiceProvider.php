<?php
namespace App\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use App\Services\ConfigService;
use App\Models\Config;

class ConfigServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(ConfigService::class, function ($app) {
            return new ConfigService(new Config());
        });
    }
}
