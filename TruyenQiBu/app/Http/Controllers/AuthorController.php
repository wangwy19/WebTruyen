<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function index()
    {
        return view('admin.list_author_admin');
    }
    public function AddAuthor()
    {
        return view('admin.add_author_admin');
    }
    public function EditAuthor()
    {
        return view('admin.edit_author_admin');
    }
    public function RestoreAuthor()
    {
        return view('admin.restore_author_admin');
    }
}
