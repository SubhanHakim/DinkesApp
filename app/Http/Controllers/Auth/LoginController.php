<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers; // Gunakan trait AuthenticatesUsers

    protected $redirectTo = '/home';
    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'bidang') {
            return redirect()->route('bidang.dashboard');
        } elseif ($user->role === 'kadis') {
            return redirect()->route('kadis.dashboard');
        }

        return redirect('/');
    }

    // Metode lainnya seperti login, logout, dll.
}
