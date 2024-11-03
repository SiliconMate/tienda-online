<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectMenu extends Component
{
    public function __construct(
        public string $name,
        public bool $disabled = false,
        public array $options = [],
        public string $key = 'id',
    )
    {
        $this->options = is_array($options) ? $options : [];
    }

    public function render(): View|Closure|string
    {
        return view('components.select-menu');
    }
}
