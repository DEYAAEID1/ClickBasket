<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\DeleteUserRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('shop.frontend.profile', [
    'user' => $request->user(),
]);

    }

    /**
 * Update the user's profile information.
 */

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();  // Get the currently logged-in user
        $validated = $request->validated();  // recall the valedated data from the request


        if ($user instanceof \App\Models\User) { // chik if the object is a user instance
            $user->update($validated);  // update user data
        } else {
            return back()->withErrors(['user' => 'User not found']);
        }

        return redirect()->route('user.dashboard')->with('success', 'Profile updated successfully.');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(DeleteUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = $request->user();
        Auth::logout();

        $user->delete(); // This line is correct, the 'update' method error was in the update function.

        return redirect()->route('home')->with('status', 'Account deleted successfully.');
    }
}
