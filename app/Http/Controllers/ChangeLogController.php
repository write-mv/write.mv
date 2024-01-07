<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ChangeLogController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $issues = Cache::remember('change-log', 2000, function () {
            return Http::get('https://api.github.com/repos/baraveli/write.mv-issues-and-features/issues?state=closed')->json();
        });

        return view('pages.change-log', [
            'issues' => $issues,
        ]);
    }
}
