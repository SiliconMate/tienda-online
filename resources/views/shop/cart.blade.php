<x-home-layout>
    <div class="container py-4 flex items-center gap-3 ml-8">
        <a href="/" class="text-gray-600 font-medium hover:text-blue-700">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <a href="/checkout" class="text-gray-600 font-medium hover:text-blue-700">
            Carrito
        </a>
    </div>
    {{-- <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Carrito de Compras</h1>
        @if (Cart::count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach (Cart::content() as $item)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="relative h-48 flex items-center justify-center bg-gray-100">
                            <img src="{{ asset('storage/products/' . $item->model->images->first()->path) }}" alt="{{ $item->name }}" class="max-h-full max-w-full object-contain">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{ $item->name }}</h3>
                            <p class="text-gray-600">${{ number_format($item->price, 2) }}</p>
                            <div class="flex items-center mt-2">
                                <form action="{{ route('cart.update', $item->rowId) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->qty }}" min="1" class="w-16 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Actualizar</button>
                                </form>
                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST" class="ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">
                <h2 class="text-xl font-bold">Total: ${{ Cart::total() }}</h2>
                <a href="{{ route('checkout.index') }}" class="mt-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Proceder al Pago</a>
            </div>
        @else
            <p class="text-gray-600">Tu carrito está vacío.</p>
        @endif
    </div> --}}
</x-home-layout>