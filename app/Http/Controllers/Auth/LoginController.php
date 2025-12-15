<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Check if request expects JSON (AJAX request) - check multiple ways
        $acceptHeader = $request->header('Accept', '');
        $xRequestedWith = $request->header('X-Requested-With', '');
        
        // Explicitly check for JSON request indicators
        $isJsonRequest = str_contains($acceptHeader, 'application/json')
            || $xRequestedWith === 'XMLHttpRequest'
            || $request->expectsJson() 
            || $request->wantsJson() 
            || $request->ajax();

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Determine redirect based on user role
            $redirectRoute = Auth::user()->is_admin 
                ? route('admin.dashboard') 
                : route('dashboard');

            // Always return JSON if Accept header contains application/json
            if ($isJsonRequest || str_contains($acceptHeader, 'application/json')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Login successful!',
                    'redirect' => $redirectRoute
                ], 200, ['Content-Type' => 'application/json']);
            }

            return redirect()->intended($redirectRoute)->with('success', 'Login successful!');
        }

        // Failed login attempt
        if ($isJsonRequest || str_contains($acceptHeader, 'application/json')) {
            return response()->json([
                'success' => false,
                'message' => 'The provided credentials do not match our records.',
                'errors' => [
                    'email' => ['The provided credentials do not match our records.']
                ]
            ], 422, ['Content-Type' => 'application/json']);
        }

        throw ValidationException::withMessages([
            'email' => __('The provided credentials do not match our records.'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing')->with('success', 'Logged out successfully!');
    }
}
