<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['author' => function ($q) {
                            $q->select('id', 'name');}])
                       ->with(['category' => function ($q) {
                            $q->select('id', 'slug', 'title');}])
                       ->where('status', Post::IS_PUBLIC)->paginate(2);

        return view('pages.posts')->with('posts', $posts);

    }

    /**
     * @param array $middleware
     */
    public function setMiddleware(array $middleware)
    {
        $this->middleware = $middleware;
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('pages.show', compact('post'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->where('status', 1)->paginate(3);
        return view('pages.list', ['posts' => $posts]);

    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->paginate(2);
        return view('pages.list', ['posts' => $posts]);
    }





}
