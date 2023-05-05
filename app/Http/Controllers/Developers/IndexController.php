<?php

namespace App\Http\Controllers\Developers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.developers.index');
    }
}
