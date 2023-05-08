<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateController extends Controller
{
    public function __invoke():  View
    {
        return view('pages.jobs.create');
    }
}
