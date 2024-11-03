<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-semibold mb-2 text-gray-600">
        {{ $slot }}
    </label>
    <textarea id="{{ $name }}"
              name="{{ $name }}"
              placeholder="{{ $disabled ? 'Deshabilitado' : $placeholder }}"
              class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 {{ $disabled ? 'bg-gray-400' : '' }}"
              @disabled($disabled)
              @required($required)
              rows="{{ $rows }}">{{ $value }}</textarea>
</div>