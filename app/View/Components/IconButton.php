<?php

namespace App\View\Components;

use Illuminate\View\Component;

class IconButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $icon;
    public $text;
    public $bgColor;
    public $textColor;

    public function __construct($icon, $text, $bgColor, $textColor)
    {
        $this->icon = $icon;
        $this->text = $text;
        $this->bgColor = $bgColor;
        $this->textColor = $textColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.icon-button');
    }
}
