<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    //
    public function index()
    {
        return view('admin.list_comic_admin');
    }

    public function AddComic()
    {
        return view('admin.add_comic_admin');
    }

    public function RestoreComic()
    {
        return view('admin.restore_comic_admin');
    }

    public function EditComic()
    {
        return view('admin.edit_comic_admin');
    }
}
