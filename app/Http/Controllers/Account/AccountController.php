<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function __invoke()
    {
        return view('accounts.account');
    }
}
