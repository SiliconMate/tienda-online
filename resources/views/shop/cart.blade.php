<x-home-layout>
    <div class="container py-4 flex items-center gap-3 ml-8">
        <a href="/" class="text-gray-600 font-medium hover:text-blue-700">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <a href="/cart" class="text-gray-600 font-medium hover:text-blue-700">
            Carrito
        </a>
    </div>
    
    <div x-data="cart" class="container mx-auto p-6">
        <h2 class="text-xl font-semibold mb-4">Tu carrito de compras</h2>

        <!-- Verificar si el carrito tiene productos -->
        <template x-if="items.length > 0">
            <div>
                <ul class="space-y-4">
                    <template x-for="item in items" :key="item.id">
                        <li class="flex justify-between items-center p-4 border border-gray-300 rounded-lg">
                            <div class="flex items-center gap-4">
                                <img :src="item.image" alt="Product Image" class="w-20 h-20 object-cover rounded-md">
                                <div>
                                    <h3 class="font-semibold text-gray-800" x-text="item.name"></h3>
                                    <p class="text-sm text-gray-500" x-text="item.description"></p>
                                    <div class="flex items-center gap-4 mt-2">
                                        <button @click="incrementQuantity(item.id)" class="text-gray-500 hover:text-gray-700">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                        <span x-text="item.quantity"></span>
                                        <button @click="decrementQuantity(item.id)" class="text-gray-500 hover:text-gray-700">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-2" x-text="'$' + (item.price * item.quantity).toFixed(2)"></p>
                                </div>
                            </div>
                            <button @click="removeFromCart(item.id)" class="text-red-500 hover:text-red-700 font-semibold">
                                <i class="fa-solid fa-trash text-xl mr-6"></i>
                            </button>
                        </li>
                    </template>
                </ul>
                
                <div class="mt-6 flex justify-between items-center">
                    <span class="font-semibold text-lg">Total:</span>
                    <span class="text-xl font-bold text-gray-800" x-text="'$' + totalPrice"></span>
                </div>
                <div class="mt-4 flex justify-end gap-4">
                    <button @click="clearCart" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600">Vaciar carrito</button>
                    <button class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Proceder al pago</button>
                </div>
            </div>
        </template>

        <!-- Si el carrito está vacío -->
        <template x-if="items.length === 0">
            <div class="text-center text-gray-500">
                <p>Tu carrito está vacío.</p>
                <a href="/" class="text-blue-600 hover:text-blue-700">Explora productos para agregar al carrito</a>
            </div>
        </template>
    </div>

</x-home-layout>