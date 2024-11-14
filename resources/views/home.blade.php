@php
$images = [
    ['src' => 'home-carousel/DC_20241018174428_XdEjhTqS.png', 'alt' => 'Image 1 description'],
    ['src' => 'home-carousel/DC_20241018174550_a2KBtWsN.png', 'alt' => 'Image 2 description'],
    ['src' => 'home-carousel/DC_20241022151949_kdqhRLmI.png', 'alt' => 'Image 3 description']
];
@endphp

<x-home-layout>
    <x-home.carousel :images="$images" />

    <section class="container mx-auto py-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 pl-3">Explora nuestras categorías</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach (App\Models\Category::all() as $category)
                <a href="{{-- route('categories.show', $category->id) --}}" class="block mx-4 bg-gray-800 shadow-md rounded-sm overflow-hidden transform transition duration-300 hover:scale-105 text-center p-4 no-underline">
                    <h3 class="text-2xl font-semibold text-slate-200">{{ $category->name }}</h3>
                    <p class="text-slate-300 text-md">{{ $category->description }}</p>
                </a>
            @endforeach
        </div>
    </section>

    {{-- productos destacados --}}
    <section class="container mx-auto py-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 pl-3">Productos destacados</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach (App\Models\Product::all()->take(6) as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </section>

</x-home-layout>