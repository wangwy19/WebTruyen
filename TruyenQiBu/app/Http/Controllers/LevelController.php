<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    //
    public function index()
    {
        return view('admin.list_level_admin');
    }
    public function AddLevel()
    {
        return view('admin.add_level_admin');
    }
    public function EditLevel()
    {
        return view('admin.edit_level_admin');
    }
}
