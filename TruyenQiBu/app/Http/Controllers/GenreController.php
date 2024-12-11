<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return view('admin.list_genre_admin');
    }
    public function AddGenre()
    {
        return view('admin.add_genre_admin');
    }
    public function EditGenre()
    {
        return view('admin.edit_genre_admin');
    }
    public function RestoreGenre()
    {
        return view('admin.restore_genre_admin');
    }
}
