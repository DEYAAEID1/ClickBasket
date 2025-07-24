<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    // public function createAdmin(): View
    // {
    //     return view('auth.admin-Login');
    // }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
    $request->session()->regenerate();

    if (!Auth::attempt($credentials)) {
        return redirect()->route('login')->withErrors([
            'email' => 'Invalid login credentials',
        ]);
    }

        /** @var User $user */
    $user = Auth::user();

    if ($user->hasRole('admin')) {
        return redirect()->intended(RouteServiceProvider::DASHBOARD);
        }


    return redirect()->intended(RouteServiceProvider::HOME);

    }





    /**
     * Destroy an authenticated session.
     */

    // public function storeAdmin(LoginRequest $request): RedirectResponse
    // {
    //     $credentials = $request->only('email', 'password');
    //     $request->session()->regenerate();
    //     if (!Auth::guard('admin')->attempt($credentials)) {
    //         return redirect()->route('login.admin-Login')->withErrors([
    //             'email' => 'Invalid login credentials',
    //         ]);
    //     }

    //     /** @var User $user */
    //     $user = Auth::guard('admin')->user();

    //     if (!$user->hasRole('admin')) {
    //         Auth::guard('admin')->logout();
    //         return redirect()->route('login')->withErrors([
    //             'email' => 'Access is restricted. Please use the user login page to sign in',
    //         ]);
    //     }



    //     return redirect()->intended(RouteServiceProvider::DASHBOARD);
    // }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function destroyAdmin(Request $request): RedirectResponse
    {

        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}


// عند ربط المستخدم مع الدور (role) استخدم:
// $user->roles()->syncWithoutDetaching([$role->id]);
