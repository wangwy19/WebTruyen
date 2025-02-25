<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\chapter;
use App\Models\comic;
use App\Models\image;
use App\Models\user;
use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\FunctionUnit;

class ChapterController extends Controller
{
    //admin
    public function index()
    {
        $chapters = chapter::with(['comic'])->get();
        return view('admin.list_chapter_admin', compact('chapters'));
    }
    public function AddChapter()
    {

        $comics = comic::with(['chapters' => function ($query) {
            $query->orderBy('chapter_number', 'desc');
        }])->get();
        return view('admin.add_chapter_admin', compact('comics'));
    }
    public function StoreChapter(Request $request)
    {
        $check = chapter::where('chapter_number', "=", $request->chapter_number)->where('comic_id', "=", $request->comic_id)->first();
        if ($check != null) {
            session()->flash('fail_chapter_number', 'Chương đã tồn tại!');
            return redirect()->route('admin.add_chapter_admin');
        }
        $chapter = new chapter();
        $chapter->chapter_number = $request->chapter_number;
        $chapter->comic_id = $request->comic_id;
        $chapter->save();
        if ($request->hasFile('chapters')) {
            $files = $request->file('chapters');
            $indx = 1;
            foreach ($files as $file) {
                $img = new image();
                $extension = $file->getClientOriginalExtension();
                $fileName = $indx . '.' . $extension;
                $path = "/imgs/chapters/$chapter->comic_id/$chapter->id/$fileName";
                $file->storeAs($path);
                $img->name = $fileName;
                $img->chapter_id = $chapter->id;
                $img->save();
                $indx += 1;
            }
        }
        session()->flash('success', 'Thêm thành công!');
        return redirect()->route('admin.list_chapter_admin');
    }

    public function EditChapter($id)
    {
        $chapters = chapter::with(['comic'])->findOrFail($id); // Lấy thông tin tác giả theo ID
        return view('admin.edit_chapter_admin', compact('chapters')); // Trả về view với dữ liệu tác giả
    }

    // Cập nhật thông tin tác giả
    public function UpdateChapter(Request $request, $id)
    {

        $check = chapter::where('chapter_number', "=", $request->chapter_number)->where('id', "!=", $id)->where('comic_id', "=", $request->comic_id)->first();
        if ($check != null) {
            session()->flash('fail_chapter_number', 'Chương đã tồn tại!');
            return redirect()->route('admin.edit_chapter_admin', ['id' => $id]);
        }

        // Cập nhật thông tin tác giả
        $chapter = chapter::findOrFail($id);
        $chapter->chapter_number = $request->chapter_number;
        $chapter->comic_id = $request->comic_id;
        $chapter->save();
        if ($request->hasFile('chapters')) {
            $files = $request->file('chapters');
            $indx = 1;
            $chapter->images()->delete();
            foreach ($files as $file) {
                $img = new image();
                $extension = $file->getClientOriginalExtension();
                $fileName = $indx . '.' . $extension;
                $path = "/imgs/chapters/$chapter->comic_id/$chapter->id/$fileName";
                $file->storeAs($path);
                $img->name = $fileName;
                $img->chapter_id = $chapter->id;
                $img->save();
                $indx += 1;
            }
        }

        // Chuyển hướng và thông báo thành công
        return redirect()->route('admin.list_chapter_admin')->with('success', 'Cập nhật thành công!');
    }

    public function DeleteChapter(Request $request)
    {
        $chapter = chapter::findOrFail($request->id);
        image::where('chapter_id', $chapter->id)->delete();
        $chapter->delete();
        session()->flash('success', 'Xoá thành công!');
        return redirect()->route('admin.list_chapter_admin');
    }

    //user
    public function ChapterPage($slug, $chapter_number)
    {
        $comic = comic::with(['chapters', 'comments'])->where('slug', "=", $slug)->first();
        $chapters = chapter::with(['images'])->where('comic_id', "=", $comic->id)->where('chapter_number', "=", $chapter_number)->first();
        $chapters->view += 1;
        $chapters->save();
        $user = user::findOrFail(session('user')->id);
        $user->read += 1;
        $user->save();

        return view('user.chapterpage', compact('comic', 'chapters'));
    }
}
