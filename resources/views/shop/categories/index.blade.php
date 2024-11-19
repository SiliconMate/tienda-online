<x-home-layout>
    <div class="container mx-auto py-4">
        <div class="flex items-center gap-3 mb-6">
            <a href="/" class="text-gray-600 font-medium hover:text-blue-700">
                <i class="fa-solid fa-house"></i>
            </a>
            <span class="text-sm text-gray-400">
                <i class="fa-solid fa-chevron-right"></i>
            </span>
            <a href="{{ route('categories.index') }}" class="text-gray-600 font-medium hover:text-blue-700">
                Categorías
            </a>
        </div>

        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">CATEGORÍAS</h1>
        </div>

        <div class="grid md:grid-cols-3 grid-cols-1 gap-8">
            @foreach ($categories as $category)
                <div class="relative group">
                    <a href="{{ route('categories.show', $category->id) }}" class="block">
                        <div class="bg-cover bg-center h-48 rounded-lg shadow-md transition-transform transform group-hover:scale-105">
                        <img src="{{ asset('storage/categories/' . $category->path ) }}" onerror="this.onerror=null;this.src='{{ asset('images/empty.webp') }}';" alt="{{ $category->name }}" class="absolute inset-0 w-full h-full object-cover rounded-lg">
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center rounded-lg">
                                <h3 class="text-white text-xl font-semibold">{{ $category->name }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-home-layout>