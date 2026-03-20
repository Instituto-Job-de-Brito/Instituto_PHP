<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'user' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $expectedUser = (string) env('BLOG_ADMIN_USER', 'admin');
        $expectedPassword = (string) env('BLOG_ADMIN_PASSWORD', '');

        $ok =
            hash_equals($expectedUser, $validated['user']) &&
            $expectedPassword !== '' &&
            hash_equals($expectedPassword, $validated['password']);

        if (!$ok) {
            return back()
                ->withErrors(['user' => 'Credenciais inválidas.'])
                ->withInput(['user' => $validated['user']]);
        }

        $request->session()->regenerate();
        $request->session()->put('blog_admin', true);

        return redirect()->route('admin.posts.index');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('blog_admin');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}

