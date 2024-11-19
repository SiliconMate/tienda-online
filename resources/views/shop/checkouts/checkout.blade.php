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
                <div class="grid grid-cols-1 gap-6">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-gray-700 font-semibold">Nombre <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="first_name" id="first_name"
                                class="input-box border-gray-300 rounded-md w-full" value="{{ $user->firstname }}">
                        </div>
                        <div>
                            <label for="last_name" class="block text-gray-700 font-semibold">Apellido <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="last_name" id="last_name"
                                class="input-box border-gray-300 rounded-md w-full" value="{{ $user->lastname }}">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-semibold">Correo Electrónico <span
                                    class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email"
                                class="input-box border-gray-300 rounded-md w-full" value="{{ $user->email }}">
                        </div>
                        <div>
                            <label for="phone" class="block text-gray-700 font-semibold">Teléfono <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="phone" id="phone"
                                class="input-box border-gray-300 rounded-md w-full" value="{{ $user->phone }}">
                        </div>
                        <div>
                            <label for="address_line" class="block text-gray-700 font-semibold">Dirección <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="address_line" id="address_line"
                                class="input-box border-gray-300 rounded-md w-full"
                                value="{{ $address->address_line }}">
                        </div>
                        <div>
                            <label for="city" class="block text-gray-700 font-semibold">Ciudad <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="city" id="city"
                                class="input-box border-gray-300 rounded-md w-full" value="{{ $address->city }}">
                        </div>
                        <div>
                            <label for="postal_code" class="block text-gray-700 font-semibold">Código Postal <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="postal_code" id="postal_code"
                                class="input-box border-gray-300 rounded-md w-full" value="{{ $address->postal_code }}">
                        </div>
                        <div>
                            <label for="country" class="block text-gray-700 font-semibold">País <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="country" id="country"
                                class="input-box border-gray-300 rounded-md w-full" value="{{ $address->country }}">
                        </div>
                        <div>
                            <label for="state" class="block text-gray-700 font-semibold">Estado <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="state" id="state"
                                class="input-box border-gray-300 rounded-md w-full" value="{{ $address->state }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-1/3 border border-gray-300 p-6 rounded-lg shadow-sm bg-gray-100">
            <h3 class="text-2xl font-bold capitalize mb-6 text-blue-700">Resumen del Pedido</h3>
            <div class="space-y-4">
                {{-- @foreach ($cartItems as $item)
                    <div class="flex justify-between">
                        <div>
                            <h5 class="text-gray-900 font-semibold">{{ $item->name }}</h5>
                            <p class="text-sm text-gray-700">Tamaño: {{ $item->attributes->size }}</p>
                        </div>
                        <p class="text-gray-700">
                            x{{ $item->quantity }}
                        </p>
                        <p class="text-gray-900 font-semibold">${{ $item->price }}</p>
                    </div>
                @endforeach --}}
            </div>
            @if (isset($discountPercentage) && $discountPercentage > 0)
                <div
                    class="flex justify-between border-b border-gray-300 mt-2 text-gray-900 font-semibold py-4 uppercase">
                    <p>Descuento ({{ $discountCode }})</p>
                    <p>-${{ number_format($discountAmount, 2) }}</p>
                </div>
                <div class="text-green-500 font-semibold py-2">
                    Descuento aplicado
                </div>
            @endif
            <form method="POST" action="{{ route('apply.discount') }}" class="mt-4">
                @csrf
                <div class="flex items-center space-x-3">
                    <input type="text" id="discount_code" name="discount_code" placeholder="Código de descuento"
                        required
                        class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                    <x-input-error :messages="$errors->get('discount_code')" class="mt-2" />
                    <button type="submit"
                        class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors">Aplicar</button>
                </div>
            </form>
            <div class="flex justify-between border-b border-gray-300 mt-2 text-gray-900 font-semibold py-4 uppercase">
                <p>Subtotal</p>
                {{-- <p>${{ \Cart::getSubTotal() }}</p> --}}
            </div>
            <div class="flex justify-between border-b border-gray-300 mt-2 text-gray-900 font-semibold py-4 uppercase">
                <p>Envío</p>
                {{-- @if ($subtotal > 60000)
                    <p>Gratis</p>
                    @php $shipping = 0; @endphp
                @else
                    <p>$10000</p>
                    @php $shipping = 10000; @endphp
                @endif --}}
            </div>

            <div class="flex justify-between text-gray-900 font-semibold py-4 uppercase">
                <p class="font-bold">Total</p>
                {{-- <p>${{ number_format($total, 2) }}</p> --}}
            </div>

            <div id="wallet_container" class="flex justify-between text-gray-900 font-semibold py-4 uppercase">
            </div> {{-- MERCADO PAGO --}}

        </div>
    </div>
</x-home-layout>
