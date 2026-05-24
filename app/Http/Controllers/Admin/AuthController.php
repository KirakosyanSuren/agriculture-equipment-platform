<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{

    public function __construct(
        private AuthService $auth_service
    ){}

    public function show(): View
    {
        return view('pages.admin.login');
    }

    public function login(LoginRequest $request)
    {
        $login = $this->auth_service->login(
            $request->validated()
        );

        if (!$login) {
            return back()->withErrors([
                'email' => 'Invalid credentials'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.show_login');
    }
}
