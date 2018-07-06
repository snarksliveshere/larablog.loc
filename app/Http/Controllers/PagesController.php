<?php

namespace App\Http\Controllers;

use App\Post;
use App\Product;
use App\ProductCategory;
use App\User;

class PagesController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::take(3)->select('id', 'slug', 'title', 'imagePath', 'description')->get();
        $posts = Post::with(['author' => function ($q) {
                             $q->select('id', 'name');
                            }])
                        ->with(['category' => function ($q) {
                                $q->select('id', 'slug', 'title');}])
                        ->whereStatus(1)->take(4)
                        ->select('id', 'title', 'image', 'date', 'description', 'user_id')
                        ->get();

        $products = Product::with(['category' => function ($q) {
                                    $q->select('id', 'slug');}])
                            ->whereStatus(1)->take(4)->select('id', 'title', 'price', 'imagePath', 'category_id', 'slug')
                            ->get();


        return view('pages.index', ['posts' => $posts, 'products' => $products, 'categories' => $categories]);
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function about()
    {
        return view('pages.about');
    }
}
