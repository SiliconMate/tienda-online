<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DateTimeSelector extends Component
{
    public function __construct(
        public string $type,
        public string $name,
        public string $value = '',
        public string $min = '',
        public string $max = '',
        public string $step = '',
        public bool $disabled = false,
        public bool $required = true,
    )
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.date-time-selector');
    }
}
