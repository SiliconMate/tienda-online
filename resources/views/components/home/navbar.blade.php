{{-- navbar debajo del header --}}
<nav class="bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-2">
            <div class="flex space-x-6">
                <a href="/" class="text-white font-semibold hover:text-blue-300 transition duration-300">Inicio</a>
                <a href="{{route('products.index')}}" class="text-white font-semibold hover:text-blue-300 transition duration-300">Productos</a>
            </div>
            <div class="flex justify-center my-2">
                <form action="{{ route('products.index') }}" method="GET" class="flex">
                    <input type="text" name="query" placeholder="Buscar..." required class="w-48 md:w-72 p-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="p-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="flex space-x-6">
                <a href="{{route('categories.index')}}" class="text-white font-semibold hover:text-blue-300 transition duration-300">Categorías</a>
                <a href="{{-- route('contact') --}}" class="text-white font-semibold hover:text-blue-300 transition duration-300">Contacto</a>
            </div>
        </div>
    </div>
</nav>