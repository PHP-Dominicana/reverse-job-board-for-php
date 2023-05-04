<?php

namespace App\Http\Controllers\Developers;

use App\Models\User;
use Illuminate\View\View;

class HireController
{
    public function __invoke(User $developer): View
    {
        return view('pages.developers.hire', [
            'developer' => $developer
        ]);
    }
}
