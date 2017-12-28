<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationsController extends Controller
{
    public function index()
    {
        return view('registrations.index');
    }
}
