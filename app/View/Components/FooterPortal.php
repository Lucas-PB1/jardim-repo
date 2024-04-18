<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\CMS\RedesSociais;

class FooterPortal extends Component
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
        $redes_sociais = RedesSociais::all();
        return view('components.footer-portal')->with(['redes_sociais' => $redes_sociais]);
    }
}
