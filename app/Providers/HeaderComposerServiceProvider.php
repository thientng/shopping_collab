<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Category;


class HeaderComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Sử dụng View Composer để chia sẻ biến $menus với tất cả các views
        View::composer('client_view.**', function ($view) {
            $menus = Menu::take(5)->get();
            $categories = Category::where('parent_id', 0)->get();
            $view->with([
                'menus' => $menus,
                'categories' => $categories,
            ]);
        });
    }
}
