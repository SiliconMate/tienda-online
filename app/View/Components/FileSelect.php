<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileSelect extends Component
{
    public function __construct(
        public string $name,
        public string $accept = 'image/*',
        public bool $multiple = false,
        public bool $disabled = false,
        public bool $required = true,
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.file-select');
    }
}
