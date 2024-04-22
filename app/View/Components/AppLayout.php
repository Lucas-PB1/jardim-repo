<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public $title, $mainPage;
    /**
     * Create a new component instance.
     */
    public function __construct($title = null, $mainPage = false)
    {
        $this->title = $title;
        $this->mainPage = $mainPage;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
