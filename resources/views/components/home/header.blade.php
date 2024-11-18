{{-- header del layout que estara siempre --}}
<header class="bg-white shadow">
    <div class="container mx-auto px-2 sm:px-12 lg:px-48">
        <div class="flex justify-between items-center py-4">
            <div class="flex-shrink-0 mr-2">
                <a href="/">
                    <img src="{{ asset('assets/images/logos/utn.png') }}" alt="logo" class="h-12 sm:h-14 w-auto"/>
                </a>
            </div>
            <div class="flex justify-center my-2">
                <form action="{{ route('products.index') }}" method="GET" class="flex">
                    <input type="text" name="query" placeholder="Buscar..." required class="w-48 md:w-72 p-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="p-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="flex space-x-4 ml-2" x-data="cart">
                <a href="{{-- route('cart') --}}" class="text-gray-700 hover:text-gray-900 flex flex-col items-center">
                    <i class="ti ti-shopping-cart text-3xl"></i>
                    <span class="text-sm">Carrito</span>
                    <span x-text="totalItems" class="absolute top-50 right-[315px] text-xs text-white bg-red-500 rounded-full w-5 h-5 flex items-center justify-center"></span>
                </a>
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 flex flex-col items-center">
                    <i class="ti ti-user text-3xl"></i>
                    <span class="text-sm">Cuenta</span>
                </a>
            </div>
        </div>
    </div>
</header>