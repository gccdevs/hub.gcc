<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{

    public function update()
    {
        request()->user()->update(['password' => bcrypt(request('password'))]);

        if(request()->wantsJson()) {
            return response()->json(['status' => true]);
        }

        return view('auth.passwords.confirmed');

    }

}
