<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        \Log::info('Admin login attempt', ['email' => $request->email]);
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            \Log::info('User authenticated', ['user_id' => $user->id, 'is_admin' => $user->is_admin]);
            
            if ($user->is_admin) {
                $request->session()->regenerate();
                \Log::info('Admin login successful, redirecting to dashboard');
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                \Log::warning('Non-admin user attempted admin login', ['user_id' => $user->id]);
                return back()->withErrors([
                    'email' => 'These credentials do not have admin access.',
                ])->withInput($request->only('email'));
            }
        }

        \Log::warning('Admin login failed', ['email' => $request->email]);
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
} 