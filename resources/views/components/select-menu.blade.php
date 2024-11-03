<div>
    <label for="{{ $name }}"
           class="block text-sm font-semibold mb-2 text-gray-600">
      {{ $slot }}
    </label>
    <select
      id="{{ $name }}"
      name="{{ $name }}"
      class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 {{ $disabled ? 'bg-gray-400 opacity-80 pointer-events-none shadow-xl' : 'bg-gray-200' }}"
      {{ $disabled ? 'disabled' : '' }}>
      <option value="" disabled selected>Selecciona una opción</option>
      @foreach ($options as $option)
        <option value="{{ $option[$key] }}">
          {{ $option[$key] }}
        </option>
      @endforeach
    </select>
</div>
