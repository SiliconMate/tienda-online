<x-app-layout>
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detalles del Producto {{ $product->name }}</h2>
                <x-button class="ml-4" style="primary">
                    <a href="{{ route('products.index') }}">Regresar</a>
                </x-button>
            </div>
        </x-slot>

        <div class="mt-4">
            <h3 class="text-lg font-medium text-gray-900">Nombre: {{ $product->name }}</h3>
            <p class="text-sm text-gray-600">Código: {{ $product->code }}</p>
            <p class="text-sm text-gray-600">Slug: {{ $product->slug }}</p>
            <div class="mt-4">
                <h4 class="text-md font-medium text-gray-900">Imágenes:</h4>
                <div class="grid grid-cols-3 gap-4 mt-2">
                    @foreach($product->images as $image)
                        <div class="col-span-1">
                            <img src="{{ asset('storage/products/' . $image->path) }}" alt="{{ $product->name }}" class="w-full h-auto">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </x-section>
</x-app-layout>
