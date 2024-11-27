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
        <p class="text-gray-600 font-medium">Fallido</p>
    </div>

    <div class="flex justify-center">
        <div class="bg-gray-200 border border-gray-300 shadow-lg p-6 rounded-lg mb-6 flex flex-col items-center w-full max-w-4xl">
            <p class="text-4xl font-bold text-red-600 mb-10">¡ERROR EN LA COMPRA!</p>
            <div class="flex items-center space-x-8">
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-red-500 rounded-full flex items-center justify-center text-white">
                        <i class="fa-solid fa-exclamation text-7xl"></i>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Fallido</p>
                </div>
            </div>
            <a href="/" class="mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Volver a inicio</a>
        </div>
    </div>
</x-home-layout>