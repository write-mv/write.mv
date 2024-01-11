<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Team;
use App\Models\User;
use App\Modules\BlogNameGenerator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SignInController extends Controller
{
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::where('github_id', $githubUser->id)->orWhere('email', $githubUser->email)->first();

        if (! $user) {
            DB::transaction(function () use ($githubUser) {

                $randomName = (new BlogNameGenerator)->generate();

                $team = Team::create([
                    'name' => $randomName,
                ]);

                Blog::create([
                    'name' => $randomName,
                    'site_title' => $randomName,
                    'url' => url('/'.$randomName),
                    'team_id' => $team->id,
                ]);

                Auth::login($user = User::create([
                    'name' => $githubUser->name,
                    'email' => $githubUser->email,
                    'github_id' => $githubUser->id,
                    'github_token' => $githubUser->token,
                    'github_refresh_token' => $githubUser->refreshToken,
                    'password' => Hash::make('randomdigitsss'),
                    'team_id' => $team->id,
                ]));
                event(new Registered($user));
            });

            return redirect('/dashboard');
        }

        $user->update([
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);

        Auth::login($user, true);

        return redirect('/dashboard');
    }
}
