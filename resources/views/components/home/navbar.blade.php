{{-- navbar debajo del header --}}
<nav class="bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="flex justify-center items-center py-2">
            <div class="flex space-x-6">
                <a href="/" class="text-white font-semibold hover:text-blue-300 transition duration-300">Inicio</a>
                <a href="{{route('products.index')}}" class="text-white font-semibold hover:text-blue-300 transition duration-300">Productos</a>
                <a href="{{route('categories.index')}}" class="text-white font-semibold hover:text-blue-300 transition duration-300">Categorías</a>
                <a href="/aboutUs" class="text-white font-semibold hover:text-blue-300 transition duration-300">Sobre nosotros</a>
            </div>
        </div>
    </div>
</nav>
