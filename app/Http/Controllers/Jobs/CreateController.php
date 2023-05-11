<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CreateController extends Controller
{
    public function __invoke():  View
    {
        return view('pages.jobs.create', [
            'user' => Auth::user(),
        ]);
    }
}
