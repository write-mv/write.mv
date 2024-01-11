<?php

namespace App\Http\Controllers;

class WhatsNewController extends Controller
{
    public function __invoke()
    {
        return view('pages.whats-new');
    }
}
