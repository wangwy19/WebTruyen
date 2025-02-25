<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    //admin
    public function index()
    {
        $levels = level::all();
        return view('admin.list_level_admin', compact('levels'));
    }
    public function AddLevel()
    {
        return view('admin.add_level_admin');
    }

    public function EditLevel($id)
    {
        $levels = level::findOrFail($id); // Lấy thông tin tác giả theo ID
        return view('admin.edit_level_admin', compact('levels')); // Trả về view với dữ liệu tác giả
    }

    public function StoreLevel(Request $request)
    {

        $check = level::where('name', "=", $request->name)->first();
        if ($check != null) {
            session()->flash('fail_name', 'Tên đã tồn tại!');
            return redirect()->route('admin.add_level_admin');
        }
        $check = level::where('max_read', "=", $request->max_read)->first();
        if ($check != null) {
            session()->flash('fail_name', 'Tên đã tồn tại!');
            return redirect()->route('admin.add_level_admin');
        }


        $level = new level();
        $level->name = $request->name;
        $level->max_read = $request->max_read;
        $level->save();
        session()->flash('success', 'Thêm thành công!');
        return redirect()->route('admin.list_level_admin');
    }

    public function UpdateLevel(Request $request, $id)
    {


        $check = level::where('name', "=", $request->name)->where('id', "!=", $id)->first();
        if ($check != null) {
            session()->flash('fail_name', 'Tên đã tồn tại!');
            return redirect()->route('admin.edit_level_admin', ['id' => $id]);
        }
        $check = level::where('max_read', "=", $request->max_read)->where('id', "!=", $id)->first();
        if ($check != null) {
            session()->flash('fail_max_read', 'Tổng lượt đọc tồn tại!');
            return redirect()->route('admin.edit_level_admin', ['id' => $id]);
        }
        // Cập nhật thông tin tác giả
        $level = level::findOrFail($id);
        $level->name = $request->name;
        $level->max_read = $request->max_read;
        $level->save();

        // Chuyển hướng và thông báo thành công
        return redirect()->route('admin.list_level_admin')->with('success', 'Cập nhật thành công!');
    }
    public function DeleteLevel(Request $request)
    {
        $level = level::findOrFail($request->id);
        $level->delete();
        session()->flash('success', 'Xoá thành công!');
        return redirect()->route('admin.list_level_admin');
    }
}
