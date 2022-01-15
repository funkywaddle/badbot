<?php
namespace App\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use App\Services\CategoryService;
use App\Models\Category;
use App\Models\DcssDashboard;
use App\Models\Button;

class CategoriesServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService(new Category(), new DcssDashboard(), new Button());
        });
    }
}
