<div class="card overflow-hidden">
    <!-- Imagen -->
    <div class="relative">
        <a href="javascript:void(0)">
            <img src="https://placehold.co/600x400/EEE/31343C" alt="{{ $product->name }}" class="w-full">
        </a>
        <!-- Botón de añadir al carrito -->
        <a href="javascript:void(0)"
            class="bg-blue-600 w-8 h-8 flex justify-center items-center text-white rounded-full absolute bottom-0 right-0 mr-4 -mb-3">
            <i class="ti ti-basket text-base"></i>
        </a>
    </div>
    <!-- Cuerpo: descripción -->
    <div class="card-body">
        <h6 class="text-base font-semibold text-gray-600 mb-1">{{ $product->name }}</h6>
        <p class="text-sm text-gray-500 mb-2">{{ $product->description }}</p>
        <div class="flex justify-between">
            <div class="flex gap-2 items-center">
                <h6 class="text-base text-gray-600 font-semibold">${{ $product->price }}</h6>
                {{-- <span class="text-gray-500 text-sm">
                    <del>$65</del>
                </span> --}}
            </div>
            <div class="flex items-center gap-1">
                <span class="text-sm">{{ $product->stars }}</span>
                <a href="javascript:void(0)">
                    <i class="ti ti-star-filled text-yellow-500 text-sm"></i>
                </a>
            </div>
        </div>
    </div>
</div>