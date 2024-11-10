<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    /**
     * Show the form for requesting a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Handle a request to send a password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validate the email input
        $request->validate(['email' => 'required|email']);

        // Send the password reset link
        $response = Password::sendResetLink(
            $request->only('email')
        );

        // Check the response status and redirect accordingly
        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('status', Lang::get('passwords.sent'));
        }

        // If sending the reset link fails, throw a validation exception
        throw ValidationException::withMessages([
            'email' => [Lang::get('passwords.user')],
        ]);
    }
}
