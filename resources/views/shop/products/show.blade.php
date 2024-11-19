<x-home-layout>

    <div class="container py-4 flex items-center gap-3 ml-8">
        <a href="/" class="text-gray-600 font-medium hover:text-blue-700">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <a href="{{route('products.index')}}" class="text-gray-600 font-medium hover:text-blue-700">
            Productos
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">{{ $product->name }}</p>
    </div>

    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6 bg-gray-100 p-6 rounded-lg shadow-md mx-8">
        <div class="relative">
            <img id="main-image" src="{{ asset('storage/products/' . $product->images->first()->path) }}" alt="product" class="w-3/4 mx-auto transition-all duration-500 ease-in-out">
            <div id="zoom-lens" class="absolute hidden border-2 border-gray-300"></div>
            <div class="flex justify-center mt-4">
            @foreach ($product->images as $image)
            <img src="{{ asset('storage/products/' . $image->path) }}" alt="product" class="w-1/6 mx-1 cursor-pointer border-2 border-transparent hover:border-blue-800" onclick="changeMainImage('{{ asset('storage/products/' . $image->path) }}')">
            @endforeach
            </div>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-3xl font-medium uppercase mb-2 text-gray-800">{{ $product->name }}</h2>
            <div class="flex items-center mb-4">
                <div class="flex gap-1 text-sm text-yellow-400">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $product->opinions()->avg('rating'))
                            <span><i class="fa-solid fa-star"></i></span>
                        @else
                            <span><i class="fa-regular fa-star"></i></span>
                        @endif
                    @endfor
                </div>
                <div class="text-xs text-gray-500 ml-3">({{ $product->opinions()->count() }} Reviews)</div>
            </div>
            <div class="space-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Disponibilidad: </span>
                    @if ($product->inventory->quantity > 10)
                        <span class="text-green-600">Stock alto</span>
                    @elseif ($product->inventory->quantity > 0 && $product->inventory->quantity <= $product->inventory->min_quantity)
                        <span class="text-yellow-600">Quedan pocos</span>
                    @else
                        <span class="text-red-600">Agotado</span>
                    @endif
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Categoria: </span>
                    <span class="text-gray-600">{{ $product->category->name }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">SKU: </span>
                    <span class="text-gray-600">{{ $product->code }}</span>
                </p>
            </div>

            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                @if (isset($discountedPrice))
                    <p class="text-xl text-primary font-semibold">${{ number_format($discountedPrice, 2) }}</p>
                    <p class="text-base text-gray-400 line-through">${{ number_format($product->price, 2) }}</p>
                @else
                    <p class="text-xl text-primary font-semibold">${{ number_format($product->price, 2) }}</p>
                @endif
            </div>

            {{-- <form method="POST" action="{{ route('apply.discount', $product->id) }}" class="mt-4">
                @csrf
                <div class="flex items-center space-x-3">
                    <input type="text" id="discount_code" name="discount_code" placeholder="Código de descuento"
                        required
                        class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                        <x-input-error :messages="$errors->get('discount_code')" class="mt-2" />
                    <button type="submit"
                        class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors">Aplicar</button>
                </div>
            </form> --}}

            <p class="mt-4 text-gray-600">{{ $product->description }}</p>

            <div class="mt-4">
                <h3 class="text-sm text-gray-800 uppercase mb-1">Cantidad</h3>
                <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                    <div id="decrement"
                        class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                    <div id="quantity" class="h-8 w-8 text-base flex items-center justify-center">1</div>
                    <div id="increment"
                        class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
                </div>
            </div>

            <div class="mt-6 flex gap-3 border-b border-gray-200 pb-5 pt-5" x-data="cart">
                <button @click="addToCart({
                        id: {{ $product->id }},
                        price: {{ $product->price }},
                        quantity: 1,
                    })"
                        class="bg-blue-600 border border-blue-600 text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-blue-600 transition">
                    <i class="fa-solid fa-bag-shopping"></i> Agregar al carrito
                </button>
            </div>

            <div class="flex gap-3 mt-4">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"
                    target="_blank"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($product->name) }}"
                    target="_blank"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-twitter"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- ./product-detail -->

    <!-- valorations -->
    <div class="container mt-8 mx-8">
        <h2 class="text-3xl font-bold text-gray-800 uppercase mb-6">Valoraciones</h2>
        @foreach ($product->opinions as $opinion)
            <div class="bg-white p-6 rounded-lg shadow-md mb-4 ">
                <div class="flex items-center mb-2">
                    <div class="text-lg text-yellow-400 flex gap-1">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $opinion->rating)
                                <span><i class="fa-solid fa-star"></i></span>
                            @else
                                <span><i class="fa-regular fa-star"></i></span>
                            @endif
                        @endfor
                    </div>
                    <div class="text-sm text-gray-500 ml-3 font-semibold">{{ $opinion->user->firstname . ' ' . $opinion->user->lastname  }}</div>
                </div>
                <p class="text-gray-700 text-lg">{{ $opinion->content }}</p>
            </div>
        @endforeach
    </div>
    
    <!-- related product -->
    <div class="container pb-16 mx-8">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Productos relacionados</h2>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($relatedProducts as $relatedProduct)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden group transform transition duration-500 hover:scale-105 flex flex-col justify-between">
                <div>
                <div class="relative">
                    <a href="{{ route('products.show', $relatedProduct->id) }}">
                    <img src="{{ asset('storage/products/' . $relatedProduct->images->first()->path) }}" alt="{{ $relatedProduct->name }}" class="w-full h-48 object-cover">
                    </a>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="{{ route('products.show', $relatedProduct->id) }}">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                        {{ $relatedProduct->name }}</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-red-600 font-semibold">
                        ${{ number_format($relatedProduct->price, 2) }}</p>
                    @if ($relatedProduct->discount)
                        <p class="text-sm text-gray-400 line-through">
                        ${{ number_format($relatedProduct->original_price, 2) }}</p>
                    @endif
                    </div>
                    <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $relatedProduct->opinions()->avg('rating'))
                            <span><i class="fa-solid fa-star"></i></span>
                        @else
                            <span><i class="fa-regular fa-star"></i></span>
                        @endif
                        @endfor
                    </div>
                    <div class="text-xs text-gray-500 ml-3">({{ $relatedProduct->opinions()->count() }})</div>
                    </div>
                </div>
                </div>
                <a href="{{-- route('cart') --}}"
                class="block w-full py-2 text-center text-white bg-blue-800 border border-blue-800 rounded-b-lg hover:bg-blue-900 transition"><i class="fa-solid fa-bag-shopping"></i> Agregar
                al carrito
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <!-- ./related product -->

    <script>
        function changeMainImage(imageUrl) {
            document.getElementById('main-image').src = imageUrl;
        }
    
        // Efecto de lupa
        const mainImage = document.getElementById('main-image');
        const zoomLens = document.getElementById('zoom-lens');
    
        mainImage.addEventListener('mousemove', moveLens);
        mainImage.addEventListener('mouseenter', () => zoomLens.classList.remove('hidden'));
        mainImage.addEventListener('mouseleave', () => zoomLens.classList.add('hidden'));
    
        function moveLens(e) {
            const rect = mainImage.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const lensSize = 150; // Aumentar el tamaño del lente
    
            zoomLens.style.width = lensSize + 'px';
            zoomLens.style.height = lensSize + 'px';
            zoomLens.style.left = (x - lensSize / 2) + 'px';
            zoomLens.style.top = (y - lensSize / 2) + 'px';
            zoomLens.style.backgroundImage = `url(${mainImage.src})`;
            zoomLens.style.backgroundSize = (mainImage.width * 2.5) + 'px ' + (mainImage.height * 2.5) + 'px'; // Aumentar la escala del zoom
            zoomLens.style.backgroundPosition = `-${x * 2.5 - lensSize / 2}px -${y * 2.5 - lensSize / 2}px`;
        }
    </script>
    <script>
        document.getElementById('increment').addEventListener('click', function() {
            let quantity = document.getElementById('quantity');
            quantity.innerText = parseInt(quantity.innerText) + 1;
        });

        document.getElementById('decrement').addEventListener('click', function() {
            let quantity = document.getElementById('quantity');
            if (parseInt(quantity.innerText) > 1) {
                quantity.innerText = parseInt(quantity.innerText) - 1;
            }
        });
    </script>
    <style>
    #main-image {
        width: 100%;
        height: auto;
    }
    #zoom-lens {
        position: absolute;
        border: 1px solid #d4d4d4;
        /* Ajusta el tamaño del lente aquí */
        width: 150px; /* Aumentar el tamaño del lente */
        height: 150px; /* Aumentar el tamaño del lente */
        background-repeat: no-repeat;
        pointer-events: none;
    }
</style>
</x-home-layout>
