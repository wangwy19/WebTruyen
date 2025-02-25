<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //admin
    public function index()
    {
        $genres = genre::all();
        return view('admin.list_genre_admin', compact('genres'));
    }

    // Hiển thị form thêm thể loại
    public function AddGenre()
    {
        return view('admin.add_genre_admin');
    }

    // Lưu thể loại mới
    public function StoreGenre(Request $request)
    {
        $check = genre::where('name', "=", $request->name)->first();
        if ($check != null) {
            session()->flash('fail_name', 'Thể loại đã tồn tại!');
            return redirect()->route('admin.add_genre_admin');
        }
        $genre = new genre();
        $genre->name = $request->name;
        $genre->save();
        session()->flash('success', 'Thêm thành công!');
        return redirect()->route('admin.list_genre_admin');
    }

    public function EditGenre($id)
    {
        $genres = genre::findOrFail($id);

        return view('admin.edit_genre_admin', compact('genres'));
    }

    public function UpdateGenre(Request $request, $id)
    {
        $check = genre::where('name', "=", $request->name)->where('id', "!=", $id)->first();
        if ($check != null) {
            session()->flash('fail_name', 'Tên đã tồn tại!');
            return redirect()->route('admin.edit_genre_admin', ['id' => $id]);
        }

        $genre = genre::findOrFail($id);
        $genre->name = $request->name;
        $genre->save();
        return redirect()->route('admin.list_genre_admin')->with('success', 'Cập nhật thành công!');
    }

    public function DeleteGenre(Request $request)
    {
        $genres = genre::findOrFail($request->id);
        $genres->comics()->sync([]);
        $genres->delete();

        return redirect()->route('admin.list_genre_admin')->with('success', 'Genre deleted successfully.');
    }

    public function RestoreGenre($id)
    {
        $genres = genre::withTrashed()->findOrFail($id);
        $genres->restore();

        return redirect()->route('admin.list_genre_admin')->with('success', 'Genre restored successfully.');
    }

    public static function GetGenres()
    {
        return genre::all();
    }
}
