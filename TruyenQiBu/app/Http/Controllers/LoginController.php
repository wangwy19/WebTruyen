<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function LoginUser()
    {
        return view('user.login_user');
    }

    public function LoginAdmin()
    {
        return view('admin.login_admin');
    }
}
