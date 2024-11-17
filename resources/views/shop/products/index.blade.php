<x-home-layout>
    
    <div class="container py-4 flex items-center gap-3 ml-8">
        <i class="fa-solid fa-house"></i>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Productos</p>
    </div>

    <!-- shop wrapper -->
    <div class="container grid md:grid-cols-4 grid-cols-2 gap-6 pt-4 pb-16 items-start">
        <!-- sidebar -->
        <!-- drawer init and toggle -->
        <div class="text-center md:hidden" >
            <button
                class="text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block md:hidden"
                type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                aria-controls="drawer-example">
                <ion-icon name="grid-outline"></ion-icon>
            </button>
        </div>
    <!-- drawer -->

    <!-- ./sidebar -->
    <div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hiddenb hidden md:block">
        <div class="divide-y divide-gray-200 space-y-5">
            <div>
                <h1 class="text-xl text-gray-800 font-medium">FILTROS</h1>
                <br>
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Categorias</h3>
                <div class="space-y-2">
                    @foreach (App\Models\Category::all() as $category)
                        <div class="flex items-center mb-4">
                            <input type="radio" name="category" id="cat-{{ $category->id }}" class="text-primary focus:ring-0  cursor-pointer" onclick="redirectToCategory({{ $category->id }})">
                            <label for="cat-{{ $category->id }}" class="text-gray-600 ml-3 cursor-pointer">{{ $category->name }}</label>
                            <div class="ml-auto text-gray-600 text-sm">({{ $category->products->count() }})</div>
                        </div>
                    @endforeach
                </div>               
            </div>

            <div class="pt-4">
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Precio</h3>
                <form method="GET" action="{{ route('products.index') }}">
                    <div class="mt-4 flex items-center">
                        <input type="text" name="min" id="min"
                            class="w-1/3 border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                            placeholder="min">
                        <span class="mx-3 text-gray-500">-</span>
                        <input type="text" name="max" id="max"
                            class="w-1/3 border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                            placeholder="max">
                        <button type="submit" class="ml-3 px-4 py-2 bg-blue-800 text-white rounded hover:bg-blue-900 transition">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ./sidebar -->

    <!-- products -->
    <div class="col-span-3">
        <div class="flex items-center mb-4">
            <select name="sort" id="sort"
                class="w-44 text-sm text-gray-600 py-3 px-4 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary">
                <option value="">Ordenar por</option>
                <option value="price-low-to-high">Mayor precio</option>
                <option value="price-high-to-low">Menor precio</option>
                <option value="latest">Ultimos productos</option>
            </select>

            <div class="flex gap-2 ml-auto">
                <div
                    class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                    <i class="fa-solid fa-table-cells"></i>
                </div>
                <div
                    class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                    <i class="fa-solid fa-list"></i>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-3 grid-cols-2 gap-6">
            @foreach ($products as $product)
                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="{{ asset('storage/products/' . $product->images->first()->path) }}" alt="{{ $product->name }}" class="w-full">
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <h6 class="text-center text-m text-gray-500 mb-1">{{ $product->category->name }}</h6>
                        <a href="{{ route('products.show', $product->id) }}">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                {{ $product->name }}</h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">${{ number_format($product->price, 0, ',', '.') }}</p>
                            @if ($product->old_price)
                                <p class="text-sm text-gray-400 line-through">${{ $product->old_price }}</p>
                            @endif
                        </div>
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
                    </div>
                    <a href="{{-- route('cart') --}}"
                        class="block w-full py-2 text-center text-white bg-blue-800 border border-blue-800 rounded-b-lg hover:bg-blue-900 transition"><i class="fa-solid fa-bag-shopping"></i> Agregar
                        al carrito
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- ./products -->
    <script>
        function redirectToCategory(id) {
            window.location.href = @json(route('categories.show', 'ID')).replace('ID', id);
        }
    
        window.addEventListener('pageshow', function(event) {
            // Reiniciar el estado de los radio buttons
            document.querySelectorAll('input[type="radio"][name="category"]').forEach(function(radio) {
                radio.checked = false;
            });
        });
    </script>
</x-home-layout>