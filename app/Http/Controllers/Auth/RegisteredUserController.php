<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User\User as UserUser;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(RegisterUserRequest $request): RedirectResponse
    {
        $validated = $request->validated(); // نستخرج القيم المُتحقق منها باستخدام FormRequest

        // منطق التسجيل هنا باستخدام البيانات المُتحقق منها
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'postal_code' => $validated['postal_code'],
        ]);

        return redirect()->route('login')->with('status', 'Registration successful.');
    }
}
