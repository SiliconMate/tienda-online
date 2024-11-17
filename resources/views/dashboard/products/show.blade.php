<x-app-layout>
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detalles de Producto</h2>
                <x-button class="ml-4" style="primary">
                    <a href="{{ route('dashboard.products.index') }}">Regresar</a>
                </x-button>
            </div>
        </x-slot>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="space-y-2">
                <h3 class="text-2xl font-bold text-gray-900">Producto: {{ $product->name }}</h3>
                <p class="text-md text-gray-700">Código: {{ $product->code }}</p>
                <p class="text-md text-gray-700">Slug: {{ $product->slug }}</p>
                <p class="text-md text-gray-700">Categoría: {{ $product->category->name }}</p>
                <p class="text-md text-gray-700">Descripción: {{ $product->description }}</p>
            </div>
            <div>
                <div class="flex overflow-x-auto space-x-4 mt-4">
                    @foreach ($product->images as $image)
                        <div class="relative group flex-shrink-0">
                            <img src="{{ asset('storage/products/' . $image->path) }}" alt="{{ $product->name }}"
                                class="w-48 h-auto rounded-lg shadow-lg">
                            <form
                                action="{{ route('dashboard.products.image.destroy', ['product' => $product, 'image' => $image->id]) }}"
                                method="POST"
                                class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 text-white p-2 hover:bg-red-800 transition duration-300 ease-in-out h-10 w-10 rounded-full">
                                    <i class="ti ti-trash text-lg"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-8">
            <h3 class="text-2xl font-bold text-gray-900">Detalles</h3>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-200">Concepto</th>
                        <th class="py-2 px-4 border-b border-gray-200">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">Precio</td>
                        <td class="py-2 px-4 border-b border-gray-200">${{ $product->price }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">Cantidad</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $product->inventory->quantity ?? 0 }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">Vendidos</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $product->orderItems ? $product->orderItems->sum('quantity') : 0 }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">Ganancias</td>
                        <td class="py-2 px-4 border-b border-gray-200">${{ $product->orderItems ? $product->orderItems->sum(function($orderItem) { return $orderItem->quantity * $orderItem->price; }) : 0 }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">Ganancias por venta</td>
                        <td class="py-2 px-4 border-b border-gray-200">${{ $product->orderItems ? $product->orderItems->sum(function($orderItem) { return $orderItem->quantity * ($orderItem->price - $product->cost); }) : 0 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-section>
</x-app-layout>
