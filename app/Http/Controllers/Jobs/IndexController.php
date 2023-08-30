<?php

namespace App\Http\Controllers\Jobs;

class IndexController
{
    public function __invoke()
    {
        return view('pages.jobs.index');
    }
}
