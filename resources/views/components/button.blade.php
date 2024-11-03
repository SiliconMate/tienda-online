<button type="{{ $type }}"
    {{ $attributes->merge(['class' => 'py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent disabled:opacity-50 disabled:pointer-events-none ' . $class]) }}
    @if($disabled) disabled @endif>
    {{ $slot }}
</button>


{{-- 

class="btn text-sm text-white font-medium w-fit hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"

class="[] text-sm text-white py-2 px-4 inline-flex items-center gap-x-2  font-semibold rounded-md border border-transparent bg-blue-600  hover:bg-blue-700"

--}}
