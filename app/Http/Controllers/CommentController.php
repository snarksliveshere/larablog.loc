<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        $comment = new Comment;
        $comment->text = $request->get('message');
        $comment->post_id =$request->get('post_id');
        $comment->user_id = \Auth::user()->id;
        $comment->save();
        return redirect()->back()->with('status', 'Ваш комментарий возможно будет добавлен');


    }
    public function storeProduct(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        $comment = new Comment;
        $comment->text = $request->get('message');
        $comment->product_id =$request->get('product_id');
        $comment->user_id = \Auth::user()->id;
        $comment->save();
        return redirect()->back()->with('status', 'Ваш комментарий возможно будет добавлен');


    }
}
