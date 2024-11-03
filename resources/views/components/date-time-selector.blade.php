<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-semibold mb-2 text-gray-600">
        {{ $slot }}
    </label>
    <input type="{{ $type }}"
           id="{{ $name }}"
           name="{{ $name }}"
           class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 {{ $disabled ? 'bg-gray-400' : '' }}"
           @disabled($disabled)
           @required($required)
           @if($min) min="{{ $min }}" @endif
           @if($max) max="{{ $max }}" @endif
           @if($step) step="{{ $step }}" @endif
           value="{{ $value }}"
    >
</div>

