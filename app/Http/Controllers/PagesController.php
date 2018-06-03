<?php

namespace App\Http\Controllers;

use App\Post;
use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)->take(2)->get();
        $products = Product::take(2)->get();
        return view('pages.index',['posts' => $posts, 'products' => $products]);
    }
}
