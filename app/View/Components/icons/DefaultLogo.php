<?php

namespace App\View\Components\icons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DefaultLogo extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icons.default-logo');
    }
}
