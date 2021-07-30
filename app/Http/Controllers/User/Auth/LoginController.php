<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('page.auth.login');
        }

        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            return redirect()->route('index');
        } else {
            return redirect()->back()->withInput();
        }
    }
}