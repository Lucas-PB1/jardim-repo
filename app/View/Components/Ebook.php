<?php

namespace App\View\Components;

use App\Models\CMS\EBooks;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Ebook extends Component
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
        $ebooks = EBooks::latest()->take(2)->get();
        return view('components.ebook')->with(['ebooks' => $ebooks]);
    }
}
