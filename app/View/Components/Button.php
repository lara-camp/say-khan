<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string $bgColor
     * @param string $textColor
     * @param string $text
     *
     * @return void
     */

    public $bgColor;
    public $textColor;
    public $text;

    public function __construct($bgColor, $textColor, $text)
    {
        $this->bgColor = $bgColor;
        $this->textColor = $textColor;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
