<?php
namespace App\Providers;

use App\Helpers\CategoryTreeTraverser;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class CategoryTreeTraverserServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->bind('App\Helpers\Contracts\CategoryTreeTraverserContract', function () {
            return new CategoryTreeTraverser();
        });
    }

    public function provides()
    {
        return ['App\Helpers\Contracts\CategoryTreeTraverserContract'];
    }
}
