<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\View\View;

class DetailController extends Controller
{
    public function __invoke(Job $job): View
    {
        return view('pages.jobs.detail', [
            'job' => $job,
        ]);
    }
}
