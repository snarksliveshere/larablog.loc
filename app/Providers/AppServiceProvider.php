<?php

namespace App\Providers;

use App\Category;
use App\Comment;
use App\Post;
use App\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('pages.post_sidebar', function ($view) {
            $view->with('popularPosts', Post::getPopularPosts());
            $view->with('recentPosts', Post::where('status', 1)->orderBy('date', 'desc')->take(3)->get());
            $view->with('categories', Category::select('id','slug','title')->get());
        });
        view()->composer('partitials.footer', function ($view) {
            $view->with('categories', ProductCategory::whereStatus(1)->select('slug', 'title')->get());
        });

        view()->composer('admin._sidebar', function($view){
            $view->with('newCommentsCount', Comment::where('status', 0)->count());
        });

//        DB::listen(function ($query){
//            dump($query->sql);
//            dump($query->bindings);
//        });

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
