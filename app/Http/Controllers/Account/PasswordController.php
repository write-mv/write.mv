<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\UpdatePasswordRequest;
use App\Jobs\UpdatePassword;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);    
    }
    
    public function update(UpdatePasswordRequest $request)
    {
        $this->dispatchNow(new UpdatePassword(Auth::user(), $request->newPassword()));
    }
}