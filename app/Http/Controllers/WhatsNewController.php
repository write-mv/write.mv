<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WhatsNewController extends Controller
{
    public function __invoke()
    {
        return view('pages.whats-new');
    }
}
