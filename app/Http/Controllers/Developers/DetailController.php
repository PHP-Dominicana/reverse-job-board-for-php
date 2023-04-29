<?php

namespace App\Http\Controllers\Developers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DetailController extends Controller
{
    public function __invoke(User $developer): View
    {
        return view('pages.developers.detail', [
            'developer' => $developer
        ]);
    }
}
