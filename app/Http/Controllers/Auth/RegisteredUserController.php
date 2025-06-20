<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Team;
use App\Models\User;
use App\Modules\BlogHelper;
use App\Providers\RouteServiceProvider;
use App\Rules\CheckIfBlockedNameIsUsed;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $inputs = $request->only('name', 'email', 'password', 'blog_name', 'password_confirmation');

        $inputs['blog_name'] = Str::slug($inputs['blog_name']);

        Validator::make($inputs, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'blog_name' => ['required', 'string', 'min:4',  new CheckIfBlockedNameIsUsed(), Rule::unique('blogs', 'name')],
        ])->validate();

        DB::transaction(function () use ($request) {

            $team = Team::create([
                'name' => $request->blog_name,
            ]);

            Blog::create([
                'name' => Str::slug($request->blog_name),
                'site_title' => $request->name,
                'url' => BlogHelper::buildBlogUrl($request->blog_name),
                'team_id' => $team->id,
            ]);

            Auth::login($user = User::create([
                'name' => $request->name,
                'role' => 'admin',
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'team_id' => $team->id,
            ]));
            event(new Registered($user));
        });

        return redirect(RouteServiceProvider::HOME);
    }
}
