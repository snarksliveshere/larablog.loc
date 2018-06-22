<?php

namespace App\Http\Controllers;

use App\Post;
use App\Product;
use App\ProductCategory;

class PagesController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::take(4)->get();
        $posts = Post::where('status', 1)->take(4)->get();
        $products = Product::take(4)->get();
        return view('pages.index',['posts' => $posts, 'products' => $products, 'categories' => $categories]);
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
