<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::take(4)->get();
        $posts = Post::where('status', 1)->take(4)->get();
        $products = Product::take(2)->get();
        return view('pages.index',['posts' => $posts, 'products' => $products, 'categories' => $categories]);
    }
}
