<x-app-layout title="Categories">
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categorias</h2>
                
                <x-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-category')">
                    Crear
                </x-button>

                @include('dashboard.categories.partials.create-category-modal')
            </div>
        </x-slot>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Imagen</th>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Slug</th>
                        <th scope="col" class="px-6 py-3">Cantidad</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $category->id }}</th>
                            <td class="px-6 py-4">
                                @if ($category->path === 'empty.webp')
                                    <img src="{{ asset("images/$category->path") }}" alt="{{ $category->name }}" class="w-12 h-12 object-cover">
                                @else
                                    <img src="{{ asset("storage/categories/$category->path") }}" alt="{{ $category->name }}" class="w-12 h-12 object-cover">
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $category->name }}</td>
                            <td class="px-6 py-4">{{ $category->slug }}</td>
                            <td class="px-6 py-4">{{ $category->products->count() }}</td>
                            <td class="px-6 py-4 flex flex-col">
                                
                                <a href="#" x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-category-{{ $category->id }}')" class="text-blue-600 hover:underline">
                                    Editar
                                </a>
                                @include('dashboard.categories.partials.edit-category-modal', ['category' => $category])
                                
                                <form action="{{ route('dashboard.categories.destroy', $category) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-section>
</x-app-layout>
