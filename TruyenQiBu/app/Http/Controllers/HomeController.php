<?php

namespace App\Http\Controllers;

use App\Models\comic;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //admin
    public function index()
    {
        return view('admin.master_admin');
    }

    //user

    public function HomePage()
    {
        $popular =  comic::with(['chapters' => function ($Query) {
            $Query->orderBy('created_at', 'desc');
        }, 'favorites'])->withSum('chapters', 'view') // Tính tổng view từ chapters
            ->orderBy('chapters_sum_view', 'desc') // Sắp xếp theo tổng view giảm dần
            ->limit(8) // Lấy 5 phần tử
            ->get();
        $new =  comic::with(['chapters' => function ($Query) {
            $Query->orderBy('created_at', 'desc');
        }, 'favorites'])->withMax('chapters', 'created_at') // Tính tổng view từ chapters
            ->orderBy('chapters_max_created_at', 'desc') // Sắp xếp theo tổng view giảm dần
            ->limit(12)
            ->get();
        $suggestion =  comic::with(['chapters' => function ($Query) {
            $Query->orderBy('created_at', 'desc');
        }, 'favorites', 'genres'])->inRandomOrder()
            ->limit(4)
            ->get();
        return view('user.homepage', compact('popular', 'new', 'suggestion'));
    }
}