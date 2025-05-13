<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */

    public $type;
    public $name;
    public $id;
    public $placeholder;
    public $value;

    public $required;

    public $options;
    public $label;
    public function __construct($type = 'text', $name = null, $placeholder = null, $value = null, $id = null, $required = false, $label=null, $options = [])
    {
        //
        $this->options = $options;
        $this->type = $type;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->id = $id;
        $this->label = $label;
        $this->required = $required;
    }



    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
