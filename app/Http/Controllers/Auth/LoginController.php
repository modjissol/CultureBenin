<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    protected $redirectTo = '/home';
    // Default redirect for non-admin users
    protected $defaultRedirect = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $adminMode = env('ADMIN_LOGIN_MODE', 'exact');
        return view('auth.login', ['adminMode' => $adminMode]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Admin login modes (configurable via .env):
        // - ADMIN_LOGIN_MODE=exact  => require exact match of ADMIN_EMAIL and ADMIN_PASSWORD
        // - ADMIN_LOGIN_MODE=email_only => allow login when email matches ADMIN_EMAIL (ignores password)
        $adminEmail = env('ADMIN_EMAIL');
        $adminPassword = env('ADMIN_PASSWORD');
        $adminMode = env('ADMIN_LOGIN_MODE', 'exact');

        if ($adminEmail && ($adminMode === 'exact') && $adminPassword
            && $request->input('email') === $adminEmail
            && $request->input('password') === $adminPassword) {
            $user = User::where('email', $adminEmail)->first();
            if (! $user) {
                $user = User::create([
                    'name' => 'Administrateur',
                    'email' => $adminEmail,
                    'password' => Hash::make($adminPassword),
                    'role' => 'admin',
                ]);
            } else {
                if ($user->role !== 'admin') {
                    $user->role = 'admin';
                    $user->save();
                }
            }

            Auth::login($user, $request->filled('remember'));
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        // email_only mode: if enabled and email matches, create/login admin without checking provided password.
        if ($adminEmail && $adminMode === 'email_only' && $request->input('email') === $adminEmail) {
            $user = User::where('email', $adminEmail)->first();
            if (! $user) {
                $user = User::create([
                    'name' => 'Administrateur',
                    'email' => $adminEmail,
                    // store a hashed random password since we don't use the provided one
                    'password' => Hash::make(Str::random(32)),
                    'role' => 'admin',
                ]);
            } else {
                if ($user->role !== 'admin') {
                    $user->role = 'admin';
                    $user->save();
                }
            }

            Auth::login($user, $request->filled('remember'));
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            // If the authenticated user is admin, redirect to dashboard; otherwise to homepage
            if (Auth::user() && Auth::user()->role === 'admin') {
                return redirect()->route('dashboard');
            }
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Identifiants invalides.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
