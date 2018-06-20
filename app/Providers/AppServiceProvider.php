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
        view()->composer('pages._sidebar', function ($view) {
            $view->with('popularPosts', Post::getPopularPosts());
            $view->with('featuredPosts', Post::where('is_featured', '1')->take(3)->get());
            $view->with('recentPosts', Post::orderBy('date', 'desc')->take(3)->get());
            $view->with('categories', Category::all());
        });
        view()->composer('pages.post_sidebar', function ($view) {
            $view->with('popularPosts', Post::getPopularPosts());
            $view->with('featuredPosts', Post::where('is_featured', '1')->take(3)->get());
            $view->with('recentPosts', Post::orderBy('date', 'desc')->take(3)->get());
            $view->with('categories', Category::all());
        });
        view()->composer('partitials.footer', function ($view) {
            $view->with('categories', ProductCategory::all());
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
