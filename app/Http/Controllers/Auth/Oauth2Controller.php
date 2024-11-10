<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Oauth2Controller extends Controller
{
    /**
     * Redirect to Google authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function oauth2google()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function googlecallback()
    {
        return $this->handleUser('google');
    }

    /**
     * Redirect to Facebook authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function oauth2facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Handle the callback from Facebook.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function facebookcallback()
    {
        return $this->handleUser('facebook');
    }

    /**
     * Redirect to GitHub authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function oauth2github()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Handle the callback from GitHub.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function githubcallback()
    {
        return $this->handleUser('github');
    }

    /**
     * Handle the user after authentication.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    private function handleUser($provider)
    {
        // Get the authenticated user details from the provider.
        $socialUser = Socialite::driver($provider)->user();

        // Prepare data to be stored or updated
        $data = [
            'name'  => $socialUser->getName() ?: '',
            'email' => $socialUser->getEmail(),
        ];

        // Find or create the user based on the email
        $user = User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            $data
        );

        // Log the user in
        Auth::login($user);

        return redirect('/');
    }
}

