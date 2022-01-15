<?php
namespace App\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use App\Services\ButtonsService;
use App\Models\Button;
use App\Models\Category;
use App\Models\Currency;
use App\Models\ButtonOptions;

class ButtonsServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(ButtonsService::class, function ($app) {
            return new ButtonsService(new Button(), new Category(), new Currency(), new ButtonOptions());
        });

        $this->app->when('App\Http\Controllers\Dashboard')
            ->needs('App\Interfaces\Service')
            ->give(ButtonsService::class);
    }
}
