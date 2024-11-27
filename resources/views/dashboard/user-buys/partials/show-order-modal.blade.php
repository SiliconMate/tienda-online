<x-modal name="show-order-{{ $order->id }}">
    <div class="p-6 pb-0">
        <div class="flex items-center">
            <i class="ti ti-shopping-cart text-3xl text-gray-800 pr-2"></i>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Orden {{ $order->id }}</h2>
        </div>
    </div>

    <div class="mt-4 px-6 pb-6">
        <h3 class="font-semibold text-lg text-gray-800 leading-tight">Productos Comprados</h3>
        <ul class="mt-2">
            @foreach ($order->orderItems as $item)
                <li class="flex justify-between items-center py-2 border-b border-gray-200">
                    <div>
                        <p class="text-gray-800">{{ $item->product->name . ' - ' . $item->product->category->name }}</p>
                        <p class="text-gray-500">{{ $item->quantity }} x ${{ $item->product->price }}</p>
                    </div>
                </li>
            @endforeach
            <li>
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <div>
                        <p class="text-gray-800">Total</p>
                    </div>
                    <div>
                        <p class="text-gray-800">${{ $order->total_price }}</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    {{-- método de pago --}}
    <div class="mt-4 px-6 pb-6">
        <h3 class="font-semibold text-lg text-gray-800 leading-tight">Método de Pago</h3>
        <ul class="mt-2">
            <li class="flex justify-between items-center py-2 border-b border-gray-200">
                <div>
                    <p class="text-gray-800">Método</p>
                </div>
                <div>
                    <p class="text-gray-800">{{ $paymentDetail->payment_method ?? 'Sin registro' }}</p>
                </div>
            </li>
            <li class="flex justify-between items-center py-2 border-b border-gray-200">
                <div>
                    <p class="text-gray-800">Proveedor</p>
                </div>
                <div>
                    <p class="text-gray-800">{{ $paymentDetail->provider ?? 'Sin registro' }}</p>
                </div>
            </li>
            <li class="flex justify-between items-center py-2 border-b border-gray-200">
                <div>
                    <p class="text-gray-800">Estado</p>
                </div>
                <div>
                    <p class="text-gray-800">{{ $paymentDetail->status ?? 'Sin registro' }}</p>
                </div>
            </li>
            <li class="flex justify-between items-center py-2 border-b border-gray-200">
                <div>
                    <p class="text-gray-800">Total Pagado</p>
                </div>
                <div>
                    <p class="text-gray-800">${{ $paymentDetail->total_paid ?? 'Sin registro' }}</p>
                </div>
            </li>
        </ul>
    </div>

    {{-- Confirmar Recepción --}}
    @if ($order->status === 'processing')
    <div class="mt-4 px-6 pb-6 flex justify-end">
        <form action="{{ route('dashboard.orders.complete', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Confirmar Recepción
            </x-button>
        </form>
    </div>
    @endif
    
</x-modal>