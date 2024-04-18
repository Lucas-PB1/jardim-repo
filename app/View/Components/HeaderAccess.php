<?php

namespace App\View\Components;

use App\Models\CMS\RedesSociais;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderAccess extends Component
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
        return view('components.header-access', compact('redes_sociais'));
    }
}
