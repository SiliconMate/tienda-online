<div class="card overflow-hidden transition-transform transform hover:scale-105 shadow-lg rounded-lg hover:border-4 hover:border-blue-800">
    <!-- Imagen -->
    <div class="relative group">
        <a href="{{ route('products.show', $product->id) }}">
            @if($product->images->isNotEmpty())
                <img src="{{ asset('storage/products/' . $product->images->first()->path) }}" alt="{{ $product->name }}" class="w-full">
            @endif
        </a>
        <!-- Botón de añadir al carrito -->
        <a href="javascript:void(0)"
            class="bg-blue-600 w-8 h-8 flex justify-center items-center text-white rounded-full absolute bottom-0 right-0 mr-4 -mb-3 opacity-0 group-hover:opacity-100 transition-opacity">
            <i class="ti ti-basket text-base"></i>
        </a>
        <!-- Estrella -->
        <div class="absolute top-0 left-0 ml-4 mt-4">
            <span class="text-sm text-gray-600">{{ $product->stars }}</span>
            <a href="javascript:void(0)">
                <i class="ti ti-star-filled text-yellow-500 text-sm"></i>
            </a>
        </div>
    </div>
    <!-- Cuerpo: descripción -->
    <div class="card-body p-4 bg-white text-center">
        <h6 class="text-xs text-gray-500 mb-1">{{ $product->category->name }}</h6>
        <h6 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h6>
        <p class="text-sm text-gray-600 mb-4">{{ $product->description }}</p>
        <div class="flex flex-col items-center">
            <div class="flex flex-col items-center gap-2">
                <h6 class="text-lg text-gray-800 font-semibold">${{ number_format($product->price, 0, ',', '.') }}</h6>
                <span class="text-xs text-gray-500 border border-gray-300 p-1 rounded bg-yellow-100">hasta 12 cuotas fijas</span>
            </div>
            <a href="{{ route('products.show', $product->id) }}" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition-colors">Ver más</a>
        </div>
    </div>
</div>
