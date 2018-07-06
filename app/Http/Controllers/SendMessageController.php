<?php

namespace App\Http\Controllers;

use App\Mail\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMessageController extends Controller
{
    public function send(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'email' => 'email',
            'message' => 'required'
        ]);

        Mail::to('mail@efef.eu')->send(new Contacts($request));

        return redirect()->back()->with('status', 'Сообщение отправлено');

    }
}
