<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        $user = Socialite::driver('github')->user();

        $user = User::where('email', $user->email)->firstOrFail();

        Auth::login($user, true);

        return redirect('/dashboard');
    }
}
