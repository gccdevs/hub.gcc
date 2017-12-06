<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update()
    {
        request()->user()->update(request()->only('name'));
//        request()->user()->update(request()->only('name','email'));

        return response()->json(['status' => true]);
    }

    public function show()
    {

        $data = User::all();

        $response = [];

        foreach ($data as $user){

            array_push($response, [
                $name = $user->name,
                $name = $user->email,
                $name = $user->mobile,
                $role = $user->role,
                $createdBy = $user->invited_by,
                $time = date('Y/m/d h:i:s',strtotime($user->created_at))
            ]);
        }

        return array_reverse($response);
    }

    public function fetchUser()
    {
        if (Auth::check()) {
            return ['name' => Auth::user()->name,'email' => Auth::user()->email];
        }else{
            return ['name' => 'No','email' => 'no@no.com'];
        }
    }

}
