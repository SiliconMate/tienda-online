<div class="flex">
    <input type="checkbox"
           id="{{ $name }}"
           name="{{ $name }}"
           value="{{ $value }}"
           class="shrink-0 mt-0.5 border-gray-200 rounded-[4px] text-blue-600 focus:ring-blue-500 {{ $disabled ? 'bg-gray-400' : '' }}"
           @if($checked) checked @endif
           @if($disabled) disabled @endif>
    <label for="{{ $name }}" class="text-sm text-gray-500 ms-3 dark:text-gray-400 {{ $disabled ? 'cursor-not-allowed' : 'cursor-pointer' }}">
        {{ $slot }}
    </label>
</div>
