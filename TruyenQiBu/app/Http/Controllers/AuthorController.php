<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\author;
use App\Models\comic;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //admin
    public function index()
    {
        $authors = author::all();
        return view('admin.list_author_admin', compact('authors'));
    }
    public function AddAuthor()
    {
        return view('admin.add_author_admin');
    }

    public function StoreAuthor(Request $request)
    {

        $check = author::where('name', "=", $request->name)->first();
        if ($check != null) {
            session()->flash('fail_name', 'Tên đã tồn tại!');
            return redirect()->route('admin.add_author_admin');
        }


        $author = new author();
        $author->name = $request->name;
        $author->save();
        session()->flash('success', 'Thêm thành công!');
        return redirect()->route('admin.list_author_admin');
    }

    // Hiển thị form chỉnh sửa tác giả
    public function EditAuthor($id)
    {
        $authors = author::findOrFail($id); // Lấy thông tin tác giả theo ID
        return view('admin.edit_author_admin', compact('authors')); // Trả về view với dữ liệu tác giả
    }

    // Cập nhật thông tin tác giả
    public function UpdateAuthor(Request $request, $id)
    {

        $check = author::where('name', "=", $request->name)->where('id', "!=", $id)->first();
        if ($check != null) {
            session()->flash('fail_name', 'Tên đã tồn tại!');
            return redirect()->route('admin.edit_author_admin', ['id' => $id]);
        }

        // Cập nhật thông tin tác giả
        $author = author::findOrFail($id);
        $author->name = $request->name;
        $author->save();

        // Chuyển hướng và thông báo thành công
        return redirect()->route('admin.list_author_admin')->with('success', 'Cập nhật thành công!');
    }
    public function DeleteAuthor(Request $request)
    {
        $author = author::findOrFail($request->id);
        comic::where('author_id', $author->id)->update(['author_id' => null]);
        $author->delete();
        session()->flash('success', 'Xoá thành công!');
        return redirect()->route('admin.list_author_admin');
    }
}
