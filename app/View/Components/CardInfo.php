<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardInfo extends Component
{
    public $number;
    public $text;
    public $icon;
    public $color;

    public function __construct($number, $text, $icon, $color)
    {
        $this->number = $number;
        $this->text = $text;
        $this->icon = $icon;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-info');
    }
}
