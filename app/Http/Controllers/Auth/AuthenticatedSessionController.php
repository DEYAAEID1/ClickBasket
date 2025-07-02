<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laratrust\Traits\HasRolesAndPermissions; 

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // إذا كان المستخدم غير مفعل أو لم يتم التحقق من بريده الإلكتروني
        if (!auth()->check()) {
            return redirect()->route('login')->withErrors(['email' => 'خطأ في تسجيل الدخول.']);
        }

        // متوافق مع جميع الإصدارات: استخدم accessor مباشرة على الـ collection
        if (auth()->user()->roles && auth()->user()->roles->where('name', 'admin')->count() > 0) {
            return redirect()->route('admin.dashboard');
        }

        // المستخدم العادي
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

// عند ربط المستخدم مع الدور (role) استخدم:
// $user->roles()->syncWithoutDetaching([$role->id]);
