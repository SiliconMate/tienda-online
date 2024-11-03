<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{

    public function __construct(
        public string $class = 'bg-blue-600 text-white hover:bg-blue-700',
        public string $style = 'primary',
        public string $type = 'button',
        public bool $disabled = false,
    )
    {
        $this->class = match ($style) {
            'primary' => 'bg-blue-600 text-white hover:bg-blue-700',
            'secondary' => 'bg-cyan-500 text-white hover:bg-cyan-600',
            'success' => 'bg-teal-500 text-white hover:bg-teal-600',
            'warning' => 'bg-yellow-500 text-white hover:bg-yellow-600',
            'danger' => 'bg-red-500 text-white hover:bg-red-600',
            'info' => 'bg-blue-300 text-white hover:bg-blue-400',
            'dark' => 'bg-gray-600 text-white hover:bg-gray-700',
            'light' => 'bg-transparent text-gray-600 hover:bg-gray-400',
            'link' => 'text-blue-600 hover:text-blue-700',
        };
    }

    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
