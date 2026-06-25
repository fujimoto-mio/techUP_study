<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public $bg;

    public function __construct($bg = null)
    {
        $this->bg = $bg;
    }
    public function render(): View
    {
        return view('layouts.app');
    }
}
