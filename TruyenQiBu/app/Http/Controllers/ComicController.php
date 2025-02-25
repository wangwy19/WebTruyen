<?php

namespace App\Http\Controllers;

use App\Models\comic;
use App\Models\author;
use App\Models\status_comic;
use App\Models\genre;
use App\Models\favorite;
use App\Http\Controllers\Controller;
use App\Models\chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ComicController extends Controller
{
    //admin
    public function index()
    {
        $comics = comic::with(['author', 'status_comic', 'chapters', 'genres'])->get();
        // dd($comics);
        return view('admin.list_comic_admin', compact('comics'));
    }

    public function AddComic()
    {

        $authors = author::all(); // Lấy tất cả tác giả
        $statusComics = status_comic::all(); // Lấy tất cả trạng thái truyện
        $genres = genre::all(); // Lấy tất cả thể loại
        return view('admin.add_comic_admin', compact('authors', 'statusComics', 'genres'));
    }

    public function StoreComic(Request $request)
    {
        $check = comic::where('name', "=", $request->name)->first();
        if ($check != null) {
            session()->flash('fail_name', 'Tên đã tồn tại!');
            return redirect()->route('admin.add_comic_admin');
        }
        if (empty($request->genres)) {
            session()->flash('fail_genres', 'Thể loại không được bỏ trống!');
            return redirect()->route('admin.add_comic_admin');
        }

        // Cập nhật thông tin truyện

        $comic = new comic();
        $comic->name = $request->name;
        $comic->description = $request->description;
        $comic->author_id = $request->author_id;
        $comic->status_comic_id = $request->status_comic_id;
        $comic->slug = Str::slug($comic->name, '-');
        $comic->save();
        $comic->genres()->sync($request->genres);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension(); // Lấy đuôi mở rộng (vd: jpg, png, etc.)
            $fileName = $comic->id . '.' . $extension;
            $path = "/imgs/comics/$fileName";
            $file->storeAs($path);
            $comic->img = $fileName;
            $comic->save();
        }
        session()->flash('success', 'Thêm thành công!');
        return redirect()->route('admin.list_comic_admin');
    }

    public function EditComic($id)
    {
        $comic = comic::with(['author', 'status_comic', 'genres'])->findOrFail($id);
        $authors = author::all(); // Lấy tất cả tác giả
        $statusComics = status_comic::all(); // Lấy tất cả trạng thái truyện
        $genres = genre::all(); // Lấy tất cả thể loại

        return view('admin.edit_comic_admin', compact('comic', 'authors', 'statusComics', 'genres'));
    }
    public function UpdateComic(Request $request, $id)
    {
        $check = comic::where('name', "=", $request->name)->where('id', "!=", $id)->first();
        if ($check != null) {
            session()->flash('fail_name', 'Tên đã tồn tại!');
            return redirect()->route('admin.edit_comic_admin', ['id' => $id]);
        }
        if (empty($request->genres)) {
            session()->flash('fail_genres', 'Thể loại không được bỏ trống!');
            return redirect()->route('admin.edit_comic_admin', ['id' => $id]);
        }

        // Cập nhật thông tin truyện
        $comic = comic::findOrFail($id);
        $comic->name = $request->name;
        $comic->description = $request->description;
        $comic->author_id = $request->author_id;
        $comic->status_comic_id = $request->status_comic_id;
        $comic->slug = Str::slug($comic->name, '-');
        $comic->save();
        $comic->genres()->sync($request->genres);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension(); // Lấy đuôi mở rộng (vd: jpg, png, etc.)
            $fileName = $comic->id . '.' . $extension;
            $path = "/imgs/comics/$fileName";
            $file->storeAs($path);
            $comic->img = $fileName;
            $comic->save();
        }

        // Cập nhật thể loại
        return redirect()->route('admin.list_comic_admin')->with('success', 'Cập nhật truyện thành công!');
    }

    public function DeleteComic(Request $request)
    {
        $comic = comic::findOrFail($request->id);

        $chapters = chapter::where('comic_id', "=", $comic->id)->get();
        foreach ($chapters as $chapter) {
            $chapter->images()->delete();
            $chapter->delete();
        }

        $favorites = favorite::where('comic_id', "=", $comic->id)->get();
        foreach ($favorites as $favorite) {
            $favorite->delete();
        }

        $comic->genres()->sync([]);
        $comic->delete();
        session()->flash('success', 'Xoá thành công!');
        return redirect()->route('admin.list_comic_admin');
    }

    public function ComicPage($slug)
    {
        $comic = comic::where('slug', "=", $slug)->with(['genres', 'chapters', 'author', 'status_comic', 'comments'])->first();
        return view('user.comicpage', compact('comic'));
    }

    public function ExplorePage(Request $request)
    {
        $sortBy = $request->get('sortBy', '0'); // Mặc định là 'views'
        $sortGenres = $request->get('genres', []); // Mặc định là mảng rỗng
        $sortComic = $request->get('name', ''); // Mặc định là chuỗi rỗng
        $comics = comic::with(['chapters' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->when($sortComic, function ($query, $sortComic) {
            // Lọc theo tên truyện
            $query->where('name', 'like', '%' . $sortComic . '%');
        })
            ->when($sortGenres, function ($query, $sortGenres) {
                $query->whereHas('genres', function ($subQuery) use ($sortGenres) {
                    // Chỉ định bảng 'genres' để tránh nhầm lẫn với các bảng khác
                    $subQuery->whereIn('genres.id', $sortGenres);
                });
            });
        if ($sortBy == "0") {
            $comics = $comics->withMax('chapters', 'created_at')->orderBy('chapters_max_created_at', 'desc') // Sắp xếp theo tổng view giảm dần
                ->get();
        }
        if ($sortBy == "1") {
            $comics = $comics->withSum('chapters', 'view') // Tính tổng view từ chapters
                ->orderBy('chapters_sum_view', 'desc') // Sắp xếp theo tổng view giảm dần
                ->get();
        }
        if ($sortBy == "2") {
            $comics = $comics->withSum('chapters', 'view') // Tính tổng view từ chapters
                ->orderBy('chapters_sum_view', 'asc') // Sắp xếp theo tổng view giảm dần
                ->get();
        }

        $genres = genre::all();

        return view('user.explorepage', compact('comics', 'genres', 'sortBy', 'sortGenres', 'sortComic'));
    }
}
