<x-app-layout title="Productos">
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Productos</h2>
                
                <x-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-product')">
                    Crear
                </x-button>

                @include('dashboard.products.partials.create-product-modal')

            </div>
        </x-slot>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Precio</th>
                        <th scope="col" class="px-6 py-3">Categoría</th>
                        <th scope="col" class="px-6 py-3">Imagen</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->id }}</th>
                            <td class="px-6 py-4">{{ $product->name }}</td>
                            <td class="px-6 py-4">{{ $product->price }}</td>
                            <td class="px-6 py-4">{{ $product->category->name ?? 'Sin categoría' }}</td>
                            <td class="px-6 py-4">
                                @if($product->images->count())
                                    <img src="{{ asset('storage/products/' . $product->images->first()->path) }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover">
                                @else
                                    <img src="https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=" alt="{{ $product->name }}" class="w-12 h-12 object-cover">
                                @endif
                            </td>
                            <td class="px-6 py-1 flex flex-col">
                                
                                <a href="{{ route('dashboard.products.show', $product) }}" class="text-blue-600 hover:underline">Detallar</a>
                                
                                <a href="#" x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-product-{{ $product->id }}')" class="text-blue-600 hover:underline">
                                    Editar
                                </a>
                                @include('dashboard.products.partials.edit-product-modal', ['product' => $product])
                                
                                <form action="{{ route('dashboard.products.destroy', $product) }}" method="POST" class="inline">
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