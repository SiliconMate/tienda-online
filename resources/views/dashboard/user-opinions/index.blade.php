<x-app-layout>
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Mis Opiniones</h2>
            </div>
        </x-slot>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Producto</th>
                    <th scope="col" class="px-6 py-3">Opinión</th>
                    <th scope="col" class="px-6 py-3">Calificación</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($opinions as $opinion)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $opinion->product->name }}</td>
                            <td class="px-6 py-4">{{ $opinion->content }}</td>
                            <td class="px-6 py-4">
                                <div class="flex">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $opinion->rating)
                                            <i class="ti ti-star-filled text-yellow-500"></i>
                                        @else
                                            <i class="ti ti-star text-gray-300"></i>
                                        @endif
                                    @endfor
                                </div>
                            </td>
                            <td class="px-6 py-1 flex flex-col">
                                <a href="#" x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete-opinion-{{ $opinion->id }}')" class="text-red-600 hover:underline">Eliminar</a>
                                @include('dashboard.user-opinions.partials.delete-opinion-modal', ['opinion' => $opinion])

                                <a href="#" x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-opinion-{{ $opinion->id }}')" class="text-blue-600 hover:underline">Editar</a>
                                @include('dashboard.user-opinions.partials.edit-opinion-modal', ['opinion' => $opinion])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-section>
</x-app-layout>