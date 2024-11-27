<x-home-layout>
    <div class="container py-4 flex items-center gap-3 ml-8">
        <a href="/" class="text-gray-600 font-medium hover:text-blue-700">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Checkout</p>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Completado</p>
    </div>

    <div class="flex justify-center">
        <div class="bg-gray-200 border border-gray-300 shadow-lg p-6 rounded-lg mb-6 flex flex-col items-center w-full max-w-4xl">
            <p class="text-4xl font-bold text-green-600 mb-10">¡¡ GRACIAS POR SU COMPRA !!</p>
            <div class="flex items-center space-x-8">
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center text-white">
                        <i class="fa-solid fa-check text-3xl"></i>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Pendiente</p>
                </div>
                <div class="h-1 w-24 bg-green-500 mb-5"></div>
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center text-white">
                        <i class="fa-solid fa-check text-3xl"></i>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Procesando</p>
                </div>
                <div class="h-1 w-24 bg-green-500 mb-5"></div>
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center text-white">
                        <i class="fa-solid fa-check text-3xl"></i>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Completado</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center w-full max-w-4xl mx-auto">
        <div class="flex justify-center space-x-4 w-full">
            <div class="bg-blue-100 border border-gray-300 shadow-lg rounded-lg p-6 mb-6 w-full max-w-2xl">
                <p class="text-lg font-medium"><strong>Número de Orden:</strong> {{ $orderDetail->id }}</p>
            </div>
            <div class="bg-yellow-100 border border-gray-300 shadow-lg rounded-lg p-6 mb-6 w-full max-w-2xl">
                <p><strong>DIRECCION DE ENVÍO:</strong></p>
                <p>Dirección de Envío: {{ $orderDetail->address->address_line }}, {{ $orderDetail->address->city }}, {{ $orderDetail->address->state }}, {{ $orderDetail->address->country }}</p>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="bg-green-100 border border-gray-300 shadow-lg rounded-lg p-6 mb-6 w-full max-w-4xl">
            <h2 class="text-xl font-semibold mb-4">Resumen de Productos</h2>
            <ul class="space-y-4">
                @foreach ($orderDetail->orderItems as $item)
                    <li class="mb-2 p-4 bg-white rounded-lg shadow-md">
                        <p class="text-lg font-medium"><strong>Producto:</strong> {{ $item->product->name }}</p>
                        <p class="text-sm text-gray-600"><strong>Cantidad:</strong> {{ $item->quantity }}</p>
                        <p class="text-sm text-gray-600"><strong>Precio:</strong> ${{ number_format($item->product->price, 2) }}</p>
                    </li>
                @endforeach 
            </ul>
            <div class="mt-6 p-4 bg-white rounded-lg shadow-md text-right">
                <p class="text-xl font-semibold text-black"><strong>Total:</strong> ${{ number_format($orderDetail->total_price, 2) }}</p>
            </div>
        </div>
    </div>

    {{-- esto si queres sacalo --}}
    <div class="flex justify-center">
        <div class="bg-red-100 border border-gray-300 shadow-lg rounded-lg p-6 w-full max-w-4xl mb-6">
            <h2 class="text-xl font-semibold mb-4">Detalles del Usuario</h2>
            <ul>
                <li class="mb-2 p-4 bg-white rounded-lg shadow-md">
                    <p class="text-lg font-medium"><strong>Nombre completo:</strong> {{ $orderDetail->user->firstname }} {{ $orderDetail->user->lastname }}</p>
                    <p class="text-sm text-gray-600"><strong>Email:</strong> {{ $orderDetail->user->email }}</p>
                    <p class="text-sm text-gray-600"><strong>Teléfono:</strong> {{ $orderDetail->user->phone }}</p> 
                </li>
            </ul>
        </div>
    </div>

    @if ($orderDetail->orderItems[0]->product->opinions->isEmpty())
    <div class="bg-gray-200 border border-gray-300 shadow-lg rounded-lg p-8 mb-6 mx-8">
        <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">¡Valoramos mucho tu opinión sobre el producto!</h2>
        <form action="{{ route('opinions.store') }}" method="POST">
            @csrf
            @foreach ($orderDetail->orderItems as $item)
                <input type="hidden" name="product_id[]" value="{{ $item->product_id }}">
                <input type="hidden" name="user_id" value="{{ $orderDetail->user->id }}">
                <div class="mb-6">
                    <label for="content-{{ $item->product_id }}" class="block text-lg font-medium text-gray-700 mb-2">Tu opinión sobre {{ $item->product->name }}</label>
                    <textarea id="content-{{ $item->product_id }}" name="content[]" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required></textarea>
                </div>
                
                <div class="mb-6">
                    <label for="rating-{{ $item->product_id }}" class="block text-lg font-medium text-gray-700 mb-2">Calificación</label>
                    <div class="flex items-center justify-center">
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" id="rating-{{ $item->product_id }}-{{ $i }}" name="rating[{{ $item->product_id }}]" value="{{ $i }}" class="hidden" required>
                            <label for="rating-{{ $item->product_id }}-{{ $i }}" class="cursor-pointer">
                                <svg class="w-10 h-10 text-gray-400 hover:text-yellow-500 star transition duration-200" fill="currentColor" viewBox="0 0 20 20" data-value="{{ $i }}" data-product-id="{{ $item->product_id }}">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.392 2.46a1 1 0 00-.364 1.118l1.286 3.97c.3.921-.755 1.688-1.54 1.118l-3.392-2.46a1 1 0 00-1.176 0l-3.392 2.46c-.784.57-1.838-.197-1.54-1.118l1.286-3.97a1 1 0 00-.364-1.118L2.34 9.397c-.784-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.97z"/>
                                </svg>
                            </label>
                        @endfor
                    </div>
                </div>
            @endforeach
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded-full transition duration-200">
                    Enviar Opinión
                </button>
            </div>
        </form>
    </div>
    @endif
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                const stars = form.querySelectorAll('.star');
                stars.forEach(star => {
                    star.addEventListener('click', function () {
                        const value = this.getAttribute('data-value');
                        const productId = this.getAttribute('data-product-id');
                        const formStars = form.querySelectorAll(`.star[data-product-id="${productId}"]`);
                        formStars.forEach(s => {
                            if (s.getAttribute('data-value') <= value) {
                                s.classList.add('text-yellow-500');
                                s.classList.remove('text-gray-400');
                            } else {
                                s.classList.add('text-gray-400');
                                s.classList.remove('text-yellow-500');
                            }
                        });
                    });
                });
            });
        });
    </script>
</x-home-layout>

