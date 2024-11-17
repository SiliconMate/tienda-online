<x-app-layout>
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Orden #{{ $order->id }}</h2>
            </div>
        </x-slot>

        <div class="relative overflow-x-auto">
            {{-- mostrar infgormación como el usuario, dirección, cuando fue hecho, imagenes de los itemd e la orden --}}
            <div class="flex flex-col">
                <div class="flex flex-col md:flex-row md:justify-between">
                    <div class="flex flex-col mb-2">
                        <div class="flex flex-row mb-2">
                            <span class="font-semibold text-gray-800 mr-2">Cliente:</span>
                            <a href="{{ route('dashboard.users.show', $order->user->id) }}" class="text-blue-600 hover:underline">
                                {{ $order->user->firstname . " " . $order->user->lastname }}
                            </a>
                        </div>
                        <div class="flex flex-row mb-2">
                            <span class="font-semibold text-gray-800 mr-2">Dirección:</span>
                            <span>{{ $order->address }}</span>
                        </div>
                        <div class="flex flex-row mb-2">
                            <span class="font-semibold text-gray-800 mr-2">Fecha:</span>
                            <span>{{ $order->created_at }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                        <div class="flex flex-row">
                            <span class="font-semibold text-gray-800 mr-2">Total:</span>
                            <span>${{ $order->total_price }}</span>
                        </div>
                        <div class="flex flex-row mb-2">
                            <span class="font-semibold text-gray-800 mr-2">Estado:</span>
                            <span>{{ $order->status }}</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mt-4">
                    <span class="font-semibold text-gray-800">Items:</span>
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Nombre</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Precio</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Cantidad</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $item->product->name }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">${{ $item->product->price }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $item->quantity }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">${{ $item->product->price * $item->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($order->status == 'pending')
                    <div class="flex flex-row mt-4 justify-end">
                        <form action="{{ route('dashboard.orders.accept', $order->id) }}" method="POST" class="mr-2">
                            @csrf
                            @method('PUT')
                            <x-button type="submit" style="primary">Aceptar</x-button>
                        </form>
                        <form action="{{ route('dashboard.orders.cancel', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <x-button type="submit" style="danger">Rechazar</x-button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </x-section>
</x-app-layout>