<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterCheck;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('pages.register');
    }

    public function register(RegisterCheck $request)
    {
        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect('/login');
    }

    public function loginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'name' => 'required', 'password' => 'required'
        ]);

        // 1. проверить и залогинить на основе email & password
        // 2. если неправильно выводим флэш
        // 3. иначе редирект на главную

        if(Auth::attempt([
            'name' => $request->get('name'),
            'password' => $request->get('password')
        ])) {
            if (Session::has('oldUrl')) {
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
//                return redirect()->to(Session::get('oldUrl'));
                return redirect()->to($oldUrl);
            }
            return redirect('/profile');
        }
        // флэш :

        return redirect()->back()->with('status', 'Неправильный логин или пароль');

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
