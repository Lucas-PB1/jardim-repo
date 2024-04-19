<?php

namespace App\View\Components\Includes;

use Illuminate\View\Component;
use Illuminate\View\View;

class Metatags extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('includes.metatags');
    }
}
