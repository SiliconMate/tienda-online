{{-- <label for="archivo">Selecciona un archivo:</label>
    <input type="file" 
           id="archivo" 
           name="archivo" 
           accept=".jpg,.jpeg,.png,.pdf" 
           multiple 
           required 
           disabled 
           readonly 
           size="30">
    <small>Tipos de archivo permitidos: JPG, JPEG, PNG, PDF. Máximo 5 archivos.</small>
    <button type="submit">Enviar</button>

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-semibold mb-2 text-gray-600">
        {{ $slot }}
    </label>
    <input type="{{ $type }}"
           id="{{ $name }}"
           name="{{ $name }}"
           value="{{ $value }}"
           placeholder="{{ $disabled ? 'Deshabilitado' : $placeholder }}"
           class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 {{ $disabled ? 'bg-gray-400' : '' }}"
           @if($disabled) disabled @endif
           @if($required) required @endif>
</div>

public function __construct(
        public string $name,
        public string $accept = 'image/*',
        public bool $multiple = false,
        public bool $disabled = false,
        public bool $required = true,
    )
    {
    }

     --}}

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