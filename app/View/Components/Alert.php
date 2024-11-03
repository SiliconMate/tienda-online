<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(
        public string $class = 'bg-blue-500 text-blue-600',
        public string $style = 'primary',
        public string $title = 'Alerta',
    )
    {
        $this->class = match ($style) {
            'primary' => 'bg-blue-500 text-blue-600',
            'secondary' => 'bg-cyan-400 text-cyan-500',
            'success' => 'bg-teal-400 text-teal-500',
            'warning' => 'bg-yellow-400 text-yellow-500',
            'danger' => 'bg-red-400 text-red-500',
            'info' => 'bg-blue-200 text-blue-300',
            'dark' => 'bg-gray-100 border-gray-400 text-gray-600',
            'light' => 'bg-gray-500 border-gray-400 text-gray-700',
        };
    }

    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
