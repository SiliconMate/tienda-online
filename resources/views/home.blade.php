@php
$images = [
    ['src' => 'home-carousel/DC_20241018174428_XdEjhTqS.png', 'alt' => 'Image 1 description'],
    ['src' => 'home-carousel/DC_20241018174550_a2KBtWsN.png', 'alt' => 'Image 2 description'],
    ['src' => 'home-carousel/DC_20241022151949_kdqhRLmI.png', 'alt' => 'Image 3 description']
];
@endphp

<x-home-layout>
    <x-home.carousel :images="$images" />

    <div class="flex items-center justify-center h-96">
        <h1 class="text-4xl font-bold text-gray-700">Aca va el $slot</h1>
    </div>

</x-home-layout>