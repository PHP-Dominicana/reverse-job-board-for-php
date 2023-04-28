<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\User;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $developers = User::whereIn('status', ['Actively looking', 'Open'])
                          ->limit(10)
                          ->get();

        return view('home', ['developers' => $developers]);
    }
}
