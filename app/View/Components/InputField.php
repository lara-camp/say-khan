<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputField extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string $id
     * @param string $name
     * @param string $placeholder
     * @param string $color
     *
     * @return void
     */

    public $id;
    public $name;
    public $placeholder;
    public $color;

    public function __construct($id, $name, $placeholder, $color)
    {
        $this->id = $id;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-field');
    }
}
