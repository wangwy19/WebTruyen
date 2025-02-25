<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('admin')->role_id != 1) {
            session()->flash('warning', 'Bạn không đủ quyền truy cập!');

            return redirect()->route('admin.list_comic_admin');
        }
        return $next($request);
    }
}
