<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public function __construct(
        public string $name,
        public string $value = '',
        public string $placeholder = '',
        public string $rows = '3',
        public bool $required = true,
        public bool $disabled = false,
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.textarea');
    }
}
