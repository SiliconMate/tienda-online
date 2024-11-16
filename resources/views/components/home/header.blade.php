{{-- header del layout que estara siempre --}}
<header class="bg-white shadow">
    <div class="bg-yellow-500 text-center py-2 text-white font-bold">
        ENVIOS GRATIS A PARTIR DE $60.000
    </div>
    <div class="container mx-auto px-2 sm:px-12 lg:px-48">
        <div class="flex justify-between items-center py-4">
            <div class="flex-shrink-0 mr-2">
                <a href="/">
                    <img src="{{ asset('assets/images/logos/utn.png') }}" alt="logo" class="h-12 sm:h-14 w-auto"/>
                </a>
            </div>
            {{-- <div class="flex-1 flex justify-center px-2">
                <div class="max-w-lg w-full lg:max-w-xs">
                    <label for="search" class="sr-only">Buscar</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ti ti-search text-gray-500"></i>
                        </div>
                        <input id="search" name="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Buscar" type="search">
                    </div>
                </div>
            </div> --}}
            <div class="flex space-x-4 ml-2">
                <a href="{{-- route('cart') --}}" class="text-gray-700 hover:text-gray-900">
                    <i class="ti ti-shopping-cart text-3xl"></i>
                </a>
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">
                    <i class="ti ti-user text-3xl"></i>
                </a>
            </div>
        </div>
    </div>
</header>