<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = User::find($request->id);
        if (Hash::check($request->current_password, $user->password)) {
            $validated = $request->validateWithBag('updatePassword', [
                'password' => ['required', 'confirmed'],
            ]);

            $user->update([
                'password' => Hash::make($validated['password']),
            ]);

            return back()->with('success', 'Password Updated!');
        }
        return back()->with('error', 'Password not match!');
    }
}
