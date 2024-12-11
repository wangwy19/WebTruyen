<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //user
    public function RegisterUser()
    {
        return view('user.register_user');
    }
}
