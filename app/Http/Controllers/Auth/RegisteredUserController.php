<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Team;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $team = Team::create([
            "name" => $request->name
        ]);

        Blog::create([
            "name" => Str::slug($request->name),
            "site_title" => $request->name,
            "url" => url("/". Str::slug($request->name)),
            "team_id" => $team->id
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'role' => 'admin',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'team_id' => $team->id
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
