<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DashLayout extends Component
{
    public function render()
    {
        return view('layouts.dash-layout');
    }
}
