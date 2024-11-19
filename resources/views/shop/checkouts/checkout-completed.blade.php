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
                <p><strong>NÚMERO DE ORDEN:</strong></p>
                {{-- <p class="text-lg font-medium"><strong>Número de Orden:</strong> {{ $orderDetail->id }}</p> --}}
            </div>
            <div class="bg-yellow-100 border border-gray-300 shadow-lg rounded-lg p-6 mb-6 w-full max-w-2xl">
                <p><strong>DIRECCION DE ENVÍO:</strong></p>
                {{-- <p>Dirección de Envío:{{ $orderDetail->address->address_line }}, {{ $orderDetail->address->city }}, {{ $orderDetail->address->state }}, {{ $orderDetail->address->country }}</p> --}}
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="bg-green-100 border border-gray-300 shadow-lg rounded-lg p-6 mb-6 w-full max-w-4xl">
            <h2 class="text-xl font-semibold mb-4">Resumen de Productos</h2>
            <ul class="space-y-4">
                {{-- @foreach ($orderDetail->orderItems as $item)
                    <li class="mb-2 p-4 bg-white rounded-lg shadow-md">
                        <p class="text-lg font-medium"><strong>Producto:</strong> {{ $item->product->name }}</p>
                        <p class="text-sm text-gray-600"><strong>Cantidad:</strong> {{ $item->quantity }}</p>
                        <p class="text-sm text-gray-600"><strong>Precio:</strong> ${{ number_format($item->product->price, 2) }}</p>
                    </li>
                @endforeach --}}
                <!-- Ejemplo de producto -->
                <li class="mb-2 p-4 bg-white rounded-lg shadow-md">
                    <p class="text-lg font-medium"><strong>Producto:</strong> Ejemplo de Producto</p>
                    <p class="text-sm text-gray-600"><strong>Cantidad:</strong> 2</p>
                    <p class="text-sm text-gray-600"><strong>Precio:</strong> $19.99</p>
                </li>
            </ul>
            <div class="mt-6 p-4 bg-white rounded-lg shadow-md text-right">
                <p class="text-xl font-semibold text-black"><strong>Total:</strong> $39.98 prueba</p>
                {{-- <p class="text-xl font-semibold text-black"><strong>Total:</strong> ${{ number_format($orderDetail->total, 2) }}</p> --}}
            </div>
        </div>
    </div>

    {{-- esto si queres sacalo --}}
    <div class="flex justify-center">
        <div class="bg-red-100 border border-gray-300 shadow-lg rounded-lg p-6 w-full max-w-4xl mb-10">
            <h2 class="text-xl font-semibold mb-4">Detalles del Usuario</h2>
            <ul>
                <li class="mb-2 p-4 bg-white rounded-lg shadow-md">
                    {{-- 
                    <p class="text-lg font-medium"><strong>Nombre completo:</strong> {{ $orderDetail->user->firstname }} {{ $orderDetail->user->lastname }}</p>
                    <p class="text-sm text-gray-600"><strong>Email:</strong> {{ $orderDetail->user->email }}</p>
                    <p class="text-sm text-gray-600"><strong>Teléfono:</strong> {{ $orderDetail->user->phone }}</p> --}}
                    <p class="text-lg font-medium"><strong>Nombre de Usuario:</strong> EjemploUsuario</p>
                    <p class="text-sm text-gray-600"><strong>Nombre:</strong> Ejemplo Nombre</p>
                    <p class="text-sm text-gray-600"><strong>Email:</strong> ejemplo@correo.com</p>
                    <p class="text-sm text-gray-600"><strong>Teléfono:</strong> 123-456-7890</p>
                </li>
            </ul>
        </div>
    </div>
</x-home-layout>

