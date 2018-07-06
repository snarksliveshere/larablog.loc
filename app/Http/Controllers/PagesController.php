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
        $categories = ProductCategory::take(3)->select('id','slug','title','imagePath','description')->get();
        $posts = Post::whereStatus(1)->take(4)->get();
        $products = Product::whereStatus(1)->take(4)->select('id','title','price','imagePath','category_id','slug')->get();
//        $author = User::with('posts')->get();
//        dd($author);

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
