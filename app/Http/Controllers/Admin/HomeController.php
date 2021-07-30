<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin/dashboard');
        } else {
            return view('admin.auth.login_admin');
        }
    }
}