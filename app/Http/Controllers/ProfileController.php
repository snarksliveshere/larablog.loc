<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders;
        $orders->transform(function ($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
//        dd($orders);
        return view('pages.profile', compact('user','orders'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'avatar' => 'nullable|image'
        ]);

        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));
        return redirect()->back()->with('status', 'Профиль обновлен');


    }
}
