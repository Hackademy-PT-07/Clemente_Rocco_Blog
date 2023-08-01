<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $nav = [
       'articles' => 'Articoli',
       'contacts' => 'Contatti',
       'about-us' => 'Chi siamo',
       'anime-list' => 'Anime',
       'superheroes' => 'Supereroi',
    ];

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
