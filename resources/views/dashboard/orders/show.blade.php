<x-app-layout>
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Orden #{{ $order->id . ' - ' . $order->status}} </h2>
            </div>
        </x-slot>

        <div class="relative overflow-x-auto">
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
                            <span>{{ $order->address->address_line . " - " . $order->address->city . ", " . $order->address->state . " " . " - " . $order->address->postal_code }}</span>
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
                    </div>
                </div>
                <div class="flex flex-col mt-4">
                    <span class="font-semibold text-gray-800">Detalles de Pago:</span>
                    <div class="flex flex-col mt-2">
                        <div class="flex flex-row mb-2">
                            <span class="font-semibold text-gray-800 mr-2">Método:</span>
                            <span>{{ $order->paymentDetail->payment_method ?? 'Sin registro' }}</span>
                        </div>
                        <div class="flex flex-row mb-2">
                            <span class="font-semibold text-gray-800 mr-2">Proveedor:</span>
                            <span>{{ $order->paymentDetail->provider ?? 'Sin registro' }}</span>
                        </div>
                        <div class="flex flex-row mb-2">
                            <span class="font-semibold text-gray-800 mr-2">Estado:</span>
                            <span>{{ $order->paymentDetail->status ?? 'Sin registro' }}</span>
                        </div>
                        <div class="flex flex-row mb-2">
                            <span class="font-semibold text-gray-800 mr-2">Total Pagado:</span>
                            <span>${{ $order->paymentDetail->total_paid ?? 'Sin registro' }}</span>
                        </div>
                        <div class="flex flex-row mb-2">
                            <span class="font-semibold text-gray-800 mr-2">Completado:</span>
                            <span>{{ $order->paymentDetail->completed_at ?? 'Sin registro' }}</span>
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
                <div class="flex flex-row mt-4 justify-end">
                    @if ($order->status === 'pending')
                        <x-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'accept-order-{{ $order->id }}')">
                            Confirmar Envio
                        </x-button>
                        @include('dashboard.orders.partials.accept-order-modal', ['order' => $order])
                    @endif
                    
                    @if ($order->status === 'processing' || $order->status === 'pending')
                        <x-button style='danger' x-data="" x-on:click.prevent="$dispatch('open-modal', 'reject-order-{{ $order->id }}')">
                            Rechazar
                        </x-button>
                        @include('dashboard.orders.partials.reject-order-modal', ['order' => $order])
                    @endif
                </div>
            </div>
        </div>
    </x-section>
</x-app-layout>