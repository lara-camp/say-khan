<?php

namespace App\View\Components;

use Illuminate\View\Component;

class IconInputField extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $icon;
    public $placeholder;
    public $placeholderColor;
    public $bgColor;

    public function __construct($icon, $placeholder, $placeholderColor, $bgColor)
    {
        $this->icon = $icon;
        $this->placeholder = $placeholder;
        $this->placeholderColor = $placeholderColor;
        $this->bgColor = $bgColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.icon-input-field');
    }
}
