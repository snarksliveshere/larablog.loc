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
        $posts = Post::whereStatus(1)->take(4)
                                     ->select('id', 'title', 'image', 'date', 'description', 'user_id')
                                     ->get()
                                     ->load(['author' => function($q){
                                            $q->select('id', 'name');}])
                                     ->load(['category' => function($q){
                                              $q->select('id', 'slug', 'title');}
                                     ]);
        $products = Product::whereStatus(1)->take(4)->select('id','title','price','imagePath','category_id','slug')
                                           ->get()
                                           ->load(['category' => function($q){
                                                   $q->select('id', 'slug');}
                                           ]);

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
