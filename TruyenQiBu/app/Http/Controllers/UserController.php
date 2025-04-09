<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\user;
use App\Models\favorite;
use App\Models\chapter;
use Illuminate\Http\Request;
use App\Mail\RefreshPasswordMail;
use App\Models\comment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index()
    {
        $users = user::with(['role'])->where('id', "!=", 1)->get();
        return view('admin.list_user_admin', compact('users'));
    }

    public function AddUser()
    {
        return view('admin.add_user_admin');
    }

    public function StoreUser(Request $request)
    {
        $check = user::where('email', "=", $request->email)->first();
        if ($check != null) {
            session()->flash('fail_email', 'Email đã tồn tại!');
            return redirect()->route('admin.add_user_admin');
        }
        $user = new user();
        $user->fullname = $request->name;
        $user->email = $request->email;
        $user->role_id = 2;
        $user->password = '1234';
        $user->save();
        session()->flash('success', 'Thêm thành công!');
        return redirect()->route('admin.list_user_admin');
    }

    public function ManageAccount()
    {
        return view('admin.manage_account_admin');
    }

    public function ResetPass(Request $request)
    {
        $user = user::findOrFail($request->id);
        $user->password = "1234";
        $user->save();
        session()->flash('success', 'Sửa thành công!');
        return redirect()->route('admin.list_user_admin');
    }

    public function DeleteUser(Request $request)
    {
        $user = user::findOrFail($request->id);
        $user->status = 0;
        $user->save();
        session()->flash('success', 'Sửa thành công!');
        return redirect()->route('admin.list_user_admin');
    }

    public function EditAccount(Request $request)
    {
        $user = user::findOrFail(session('admin')->id);
        if ($request->name) {
            $user->fullname = $request->name;
        }
        if ($request->password) {
            $user->password = $request->password;
        }

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension(); // Lấy đuôi mở rộng (vd: jpg, png, etc.)
            $fileName = $user->id . '.' . $extension;
            $path = "/imgs/$fileName";
            $file->storeAs($path);
            $user->avatar = $fileName;
        }
        $user->save();
        session(['admin' => $user]);
        session()->flash('success', 'Sửa thành công!');
        return redirect()->route('admin.manage_user_admin');
    }

    public function UserAccount()
    {
        return view('user.accountpage');
    }
    public function UpdateAccount(Request $req)
    {
        $user = user::findOrFail(session('user')->id);
        if ($req->hasFile('avatar')) {
            $fileName = session('user')->id . '.' . $req->file('avatar')->getClientOriginalExtension();
            $req->file('avatar')->storeAs("/imgs/$fileName");
            $user->avatar = $fileName;
            $user->save();
            session(['user' => $user]);
            session()->flash('note', 'Successfull!');
            return redirect()->route('user.account_manage');
        }
        if ($req->fullname) {
            $user->fullname = $req->fullname;
            $user->save();
            session(['user' => $user]);

            session()->flash('note', 'Successfull!');
            return redirect()->route('user.account_manage');
        }
        if ($req->password) {
            $user->password = $req->password;
            $user->save();
            session(['user' => $user]);

            session()->flash('note', 'Successfull!');
            return redirect()->route('user.account_manage');
        }
        session()->flash('note', 'Warning!');
        return redirect()->route('user.account_manage');
    }


    public function RefreshPassword(Request $req)
    {
        $user = user::where('email', "=", $req->email)->first();
        if (empty($user)) {
            $user = new user();
            $user->fullname = 'user';
            $user->email = $req->email;
            $user->password = Str::random(6);
            $user->role_id = 3;
            $user->save();
        } else {
            $user->password = Str::random(6);
        }
        Mail::to($user->email)->send(new RefreshPasswordMail($user->email, $user->password));
        return response()->json([
            'msg' => true
        ]);
    }

    public function AddFavorite(Request $req)
    {
        $favorite = favorite::where('comic_id', $req->comic_id)->where('user_id', session('user')->id)->first();
        if (empty($favorite)) {
            $favorite = new favorite();
            $favorite->comic_id = $req->comic_id;
            $favorite->user_id = session('user')->id;
            $favorite->save();
            session()->flash('note', 'Added my favorites');
        } else {
            $favorite->delete();
            session()->flash('note', 'Removed my favorites');
        }
        return redirect()->route('user.comicpage', ['slug' => $req->slug]);
    }

    public static function checkFavorite($comic_id, $user_id)
    {
        $favorite = favorite::where('comic_id', $comic_id)->where('user_id', $user_id)->first();
        if (empty($favorite)) {
            return false;
        }
        return true;
    }
    public function GetFavorites()
    {
        $favorites = favorite::where('user_id', session('user')->id)->with(['comic'])->get();
        return view('user.favoritespage', compact('favorites'));
    }

    public function AddComment(Request $req)
    {
        $comment = new comment();
        $comment->comic_id = $req->comic_id;
        $comment->text = $req->text;
        $comment->user_id = session('user')->id;
        $comment->chapter_id = $req->chapter_id;
        $comment->save();
        session()->flash('note', 'Comment');
        if ($req->chapter_id) {
            return redirect()->route('user.chapterpage', ['slug' => $req->slug, 'chapter_number' => chapter::findOrFail($req->chapter_id)->chapter_number]);
        }
        return redirect()->route('user.comicpage', ['slug' => $req->slug]);
    }
}
