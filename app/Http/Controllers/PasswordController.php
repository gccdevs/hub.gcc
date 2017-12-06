<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{

    public function update()
    {
//        Auth::user()->update(['password' => bcrypt(request('password'))]);
        request()->user()->update(['password' => bcrypt(request('password'))]);

        return response()->json(['status' => true]);
    }

}
