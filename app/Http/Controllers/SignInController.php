<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use App\Models\Blog;
use App\Modules\BlogNameGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class SignInController extends Controller
{
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::where('github_id', $githubUser->id)->orWhere('email',  $githubUser->email)->first();

        if (!$user) {
            DB::transaction(function () use ($githubUser) {

                $randomName = (new BlogNameGenerator)->generate();

                $team = Team::create([
                    "name" => $randomName
                ]);

                Blog::create([
                    "name" => $randomName,
                    "site_title" => $randomName,
                    "url" => url("/" . $randomName),
                    "team_id" => $team->id
                ]);

                Auth::login($user = User::create([
                    'name' => $githubUser->name,
                    'email' => $githubUser->email,
                    'github_id' => $githubUser->id,
                    'github_token' => $githubUser->token,
                    'github_refresh_token' => $githubUser->refreshToken,
                    'password' => Hash::make("randomdigitsss"),
                    'team_id' => $team->id
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
