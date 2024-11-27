<x-home-layout>
    <div class="container py-4 flex items-center gap-3 ml-8">
        <a href="/" class="text-gray-600 font-medium hover:text-blue-700">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <a href="/checkout" class="text-gray-600 font-medium hover:text-blue-700">
            Checkout
        </a>
    </div>

    <div class="container mx-auto flex items-start pb-16 pt-4 gap-6">

        <div class="w-2/3 border border-gray-300 p-6 rounded-lg shadow-sm bg-gray-100">
            <h3 class="text-2xl font-bold capitalize mb-6 text-blue-700">Pagar</h3>
            <div class="space-y-6">
            @if ($user->addresses->count() > 0)
                <div class="grid grid-cols-1 gap-6">
                @foreach ($user->addresses as $address)
                    <div
                    class="flex flex-col p-4 border border-gray-300 rounded-lg hover:bg-gray-200 transition duration-200">
                    <div class="flex items-center">
                        <input type="radio" name="address" id="address_{{ $address->id }}"
                        value="{{ $address->id }}" class="mr-2" {{ $loop->first ? 'checked' : '' }}>
                        <label for="address_{{ $address->id }}"
                        class="block text-gray-700 font-semibold text-lg">
                        {{ $address->address_line }}, {{ $address->city }}, {{ $address->state }},
                        {{ $address->country }}, {{ $address->postal_code }}
                        </label>
                    </div>
                    <span class="block text-gray-500 text-sm mt-1">
                        {{ $address->comment }}
                    </span>
                    </div>
                @endforeach
                </div>
            @endif

            {{-- <button id="add-new-address-btn" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Agregar Nueva Dirección
            </button>

            <form id="new-address-form" action="{{ route('addresses.store') }}" method="POST" class="hidden">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                    <label for="address_line" class="block text-gray-700 font-semibold">Dirección <span
                        class="text-red-500">*</span></label>
                    <input type="text" name="address_line" id="address_line"
                        class="input-box border-gray-300 rounded-md w-full"
                        value="{{ old('address_line') }}">
                    </div>
                    <div>
                    <label for="city" class="block text-gray-700 font-semibold">Ciudad <span
                        class="text-red-500">*</span></label>
                    <input type="text" name="city" id="city"
                        class="input-box border-gray-300 rounded-md w-full" value="{{ old('city') }}">
                    </div>
                    <div>
                    <label for="postal_code" class="block text-gray-700 font-semibold">Código Postal <span
                        class="text-red-500">*</span></label>
                    <input type="text" name="postal_code" id="postal_code"
                        class="input-box border-gray-300 rounded-md w-full"
                        value="{{ old('postal_code') }}">
                    </div>
                    <div>
                    <label for="country" class="block text-gray-700 font-semibold">País <span
                        class="text-red-500">*</span></label>
                    <input type="text" name="country" id="country"
                        class="input-box border-gray-300 rounded-md w-full" value="{{ old('country') }}">
                    </div>
                    <div>
                    <label for="state" class="block text-gray-700 font-semibold">Provincia <span
                        class="text-red-500">*</span></label>
                    <input type="text" name="state" id="state"
                        class="input-box border-gray-300 rounded-md w-full" value="{{ old('state') }}">
                    </div>
                    <div>
                    <label for="phone" class="block text-gray-700 font-semibold">Teléfono <span
                        class="text-red-500">*</span></label>
                    <input type="text" name="phone" id="phone"
                        class="input-box border-gray-300 rounded-md w-full" value="{{ $user->phone }}">
                    </div>
                    <div class="col-span-2">
                    <label for="comments" class="block text-gray-700 font-semibold">Comentarios</label>
                    <textarea name="comments" id="comments" class="input-box border-gray-300 rounded-md w-full" rows="3">{{ old('comments') }}</textarea>
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700">Guardar
                    Dirección</button>
                </div>
                </div>
            </form> --}}
            </div>
        </div>

        <script>
            document.getElementById('add-new-address-btn').addEventListener('click', function() {
            document.getElementById('new-address-form').classList.toggle('hidden');
            });
        </script>

        <div class="w-1/3 border border-gray-300 p-6 rounded-lg shadow-sm bg-gray-100">
            <h3 class="text-2xl font-bold capitalize mb-6 text-blue-700">Resumen del Pedido</h3>
            <div class="space-y-4">
                @foreach ($orderItems as $item)
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-gray-800">{{ $item->product->name }} x{{ $item->quantity }}</h3>
                        <p class="text-sm text-gray-500">${{ $item->product->price * $item->quantity }}</p>
                    </div>
                @endforeach

            </div>
            <div class="flex justify-between border-b border-gray-300 mt-2 text-gray-900 font-semibold py-4 uppercase">
                <p>Envío</p>
                @php $subtotal = $orderDetail->total_price; @endphp
                @if ($subtotal > 60000)
                    <p>Gratis</p>
                    @php $shipping = 0; @endphp
                @else
                    <p>$10000</p>
                    @php $shipping = 10000;
                        $orderDetail->total_price += $shipping;
                    @endphp
                @endif
            </div>

            <div class="flex justify-between text-gray-900 font-semibold py-4 uppercase">
                <p class="font-bold">Total</p>
                <p class="font-bold">${{ $orderDetail->total_price }}</p>
            </div>

            <div id="wallet_container" class="flex justify-between text-gray-900 font-semibold py-4 uppercase">
            </div> {{-- MERCADO PAGO --}}

        </div>
    </div>
    <script>
        const mp = new MercadoPago('APP_USR-6c3aa8b4-ddd9-4feb-949b-368bcb6d8780', {
            locale: 'es-AR'
        });

        mp.bricks().create("wallet", "wallet_container", {
            initialization: {
                preferenceId: '{{ $preference->id }}'
            }
        })
    </script>
</x-home-layout>
