<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public function __construct(
        public string $type,
        public string $name,
        public string $value = '',
        public string $placeholder = '',
        public bool $disabled = false,
        public bool $required = true,
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
