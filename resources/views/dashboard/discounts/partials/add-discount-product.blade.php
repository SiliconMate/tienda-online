<x-modal name="add-product-{{ $discount->id }}" :show="$errors->any()" focusable>
    <form action="{{ route('dashboard.discounts.addproduct', $discount->id) }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-plus text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Agregar Producto al Descuento</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 py-0 px-6">
                <div>
                    <x-select-menu id="product_name" name="product_name" :options="App\Models\Product::all()->toArray()" key="name" class="block w-full" :selected="old('product_name')" required autofocus>
                        Nombre del Producto
                    </x-select-menu>
                    <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                </div>
            </div>            
            <div class="flex items-center justify-end px-6 py-3 bg-gray-400">
                <x-button type="submit" style="primary">
                    Agregar
                </x-button>
            </div>
        </div>
    </form>
    <div class="px-6 pb-4 bg-gray-400">
        <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-2">Productos Relacionados</h3>
        <ul class="list-disc list-inside space-y-2">
            @foreach($discount->products as $product)
                <li class="flex items-center">
                    <i class="ti ti-check text-green-500 pr-2"></i>
                    <span>{{ $product->name }}</span>
                    <form action="{{ route('dashboard.discounts.removeproduct', [$discount->id, $product->id]) }}" method="POST" class="inline" id="remove-product-{{ $product->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline ml-2" form="remove-product-{{ $product->id }}">
                            <i class="ti ti-x"></i>
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</x-modal>