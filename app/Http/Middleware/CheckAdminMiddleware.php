<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check để kiểm trã đã đăng nhập hay chưa
        if (Auth::check()) {
            // khi da dang nhap moi su dung function user duoc | da co collection cua user roi
            if (Auth::user()->role) {
                return $next($request); //dung thi cho di tiep
            }
            return redirect()->route('admin.auth.login')->with('error', 'Bạn không có quyền truy cập');
        }
        // neu khong dang nhap cung tra ve trang do
        return redirect()->route('admin.auth.login')->with('error', 'Bạn không có quyền truy cập');
    }
}
