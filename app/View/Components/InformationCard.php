<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InformationCard extends Component
{
    public function __construct(
        public string $header = '',
        public string $title = 'titulo',
        public string $subtitle = '',
        public string $footer = '',
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.information-card');
    }
}
