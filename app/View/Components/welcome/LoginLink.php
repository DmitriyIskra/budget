<?php

namespace App\View\Components\Welcome;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LoginLink extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $login)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.welcome.login-link');
    }
}
