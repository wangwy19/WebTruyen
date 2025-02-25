<?php

namespace App\Http\Controllers;

use App\Models\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //user
    public function LoginUser(Request $request)
    {
        $user = user::where('email', "=", $request->email)->where('password', "=", $request->password)->where('status', "=", 1)->first();
        if (empty($user)) {
            session(['note' => 'Error']);
            return redirect()->route('user.homepage');
        }
        session(['user' => $user]);
        session()->flash('note', 'Wellcome');

        return redirect()->route('user.homepage');
    }

    public function LogoutUser()
    {
        session()->forget('user');
        session()->flash('note', 'See you later');

        return redirect()->route('user.homepage');
    }


    //admin
    public function LoginAdmin(Request $request)
    {
        return view('admin.login_admin');
    }
    public function LogoutAdmin()
    {
        session()->forget('admin');
        return redirect()->route('admin.login_admin');
    }
    public function HandleLoginAdmin(Request $request)
    {
        $user = user::where('email', "=", $request->email)->where('password', "=", $request->password)->where('status', "=", 1)->whereIn('role_id', [1, 2])->first();
        session(['admin' => $user]);
        return redirect()->route('admin.list_comic_admin');
    }
}
