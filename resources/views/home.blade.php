@php
$images = [
    ['src' => 'images/home-carousel/DC_20241018174428_XdEjhTqS.png', 'alt' => 'Image 1 description'],
    ['src' => 'images/home-carousel/DC_20241018174550_a2KBtWsN.png', 'alt' => 'Image 2 description'],
    ['src' => 'images/home-carousel/DC_20241022151949_kdqhRLmI.png', 'alt' => 'Image 3 description']
];
@endphp

<x-home-layout>
    <x-home.carousel :images="$images" />
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto">
            <div class="w-10/12 grid grid-cols-1 md:grid-cols-3 gap-6 mx-auto justify-center">
                <div class="border border-primary rounded-sm px-6 py-8 flex justify-center items-center gap-5 bg-white shadow-lg">
                    <img src="{{ asset('images/icons/delivery-van.svg') }}" class="w-16 h-16 object-contain">
                    <div>
                        <h4 class="font-medium capitalize text-lg text-gray-800">Envio gratis</h4>
                        <p class="text-gray-500 text-sm">Sobre compras mayores a $60.000</p>
                    </div>
                </div>
                <div class="border border-primary rounded-sm px-6 py-8 flex justify-center items-center gap-5 bg-white shadow-lg">
                    <img src="{{ asset('images/icons/money-back.svg')}}" alt="Delivery" class="w-16 h-16 object-contain">
                    <div>
                        <h4 class="font-medium capitalize text-lg text-gray-800">Reembolso de dinero</h4>
                        <p class="text-gray-500 text-sm">Reembolso disponibles en 30 dias</p>
                    </div>
                </div>
                <div class="border border-primary rounded-sm px-6 py-8 flex justify-center items-center gap-5 bg-white shadow-lg">
                    <img src="{{ asset('images/icons/service-hours.svg')}}" alt="Delivery" class="w-16 h-16 object-contain">
                    <div>
                        <h4 class="font-medium capitalize text-lg text-gray-800">Soporte 24/7</h4>
                        <p class="text-gray-500 text-sm">Soporte al cliente</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- categorias --}}
    <section class="container mx-auto py-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 pl-3">Explora nuestras categorías</h2>
            <a href="{{ route('categories.index') }}">
                <p class="text-gray-600 font-medium">Ver todas
                    <i class="fa-solid fa-chevron-right"></i>
                </p>
            </a>
        </div>
        <div class="grid grid-cols-3 gap-3">
            @foreach (App\Models\Category::all()->take(6) as $category)
                <a href="{{ route('categories.show', $category->id) }}" class="block mx-4 bg-gray-800 shadow-md rounded-sm overflow-hidden transform transition duration-300 hover:scale-105 text-center relative no-underline">
                    <img src="{{ asset('storage/categories/' . $category->path ) }}" onerror="this.onerror=null;this.src='{{ asset('images/empty.webp') }}';" alt="{{ $category->name }}" class="w-full h-64 object-cover opacity-50">
                    <h3 class="absolute inset-0 flex items-center justify-center text-2xl font-semibold text-slate-200">{{ $category->name }}</h3>
                </a>
            @endforeach
        </div>
    </section>

    {{-- productos destacados --}}
    <section class="container mx-auto py-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 pl-3">Productos destacados</h2>
            <a href="{{ route('products.index') }}">
                <p class="text-gray-600 font-medium">Ver todos
                    <i class="fa-solid fa-chevron-right"></i>
                </p>
            </a>
        </div>
        <div class="border-2 border-blue-900 rounded-lg p-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach (App\Models\Product::all()->take(4) as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>
</x-home-layout>

