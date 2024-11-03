<div {{ $attributes->merge(['class' => 'border text-sm rounded-md p-4 mt-2 ' . $class]) }}
     role="alert">
    <span class="font-bold">{{ $title }}</span> {{ $slot }}
</div>
