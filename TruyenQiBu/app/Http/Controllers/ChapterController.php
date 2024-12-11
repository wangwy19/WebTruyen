<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    //
    public function index()
    {
        return view('admin.list_chapter_admin');
    }
    public function AddChapter()
    {
        return view('admin.add_chapter_admin');
    }
    public function RestoreChapter()
    {
        return view('admin.restore_chapter_admin');
    }
}
