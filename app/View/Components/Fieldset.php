<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Fieldset extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $etapa;

    public function __construct($title = null, $etapa = null)
    {
        //
        $this -> title = $title;
        $this ->etapa = $etapa;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fieldset');
    }
}
