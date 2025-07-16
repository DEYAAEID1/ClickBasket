<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\NewPasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;

class NewPasswordController extends Controller
{
    /**
     * Handle the password reset request.
     */
    public function store(NewPasswordRequest $request): RedirectResponse
    {
        // run resetPassword function in NewPasswordRequest class
        $status = $request->resetPassword();

        // chik if the password valedate is ok or not
        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Password reset successfully.');
        }

        return back()->withErrors(['email' => [trans($status)]]);
    }
}
