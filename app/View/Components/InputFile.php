<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputFile extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $name;
    public $id;
    public function __construct($title = null, $name = null, $id = null)
    {
        //
        $this->title = $title;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-file');
    }
}
