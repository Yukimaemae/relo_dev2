<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginregisterController extends Controller
{
    public function index() {
        return view('loginregister');
    }
}
