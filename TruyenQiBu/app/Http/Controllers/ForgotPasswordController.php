<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    //
    public function ForgotPassword()
    {
        return view('user.forgot_password');
    }
}
