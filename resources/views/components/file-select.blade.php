<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-semibold mb-2 text-gray-600">
        {{ $slot }}
    </label>
    <input type="file"
           id="{{ $name }}"
           name="{{ $name }}"
           accept="{{ $accept }}"
           @if($multiple) multiple @endif
           @if($disabled) disabled @endif
           @if($required) required @endif
           class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 {{ $disabled ? 'bg-gray-400' : '' }}">
    <small>Tipos de archivo permitidos: {{ $accept }}</small>
</div>