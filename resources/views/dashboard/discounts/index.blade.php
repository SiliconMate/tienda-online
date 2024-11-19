<x-app-layout title="Descuentos">
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Descuentos</h2>  
                <x-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-discount')">
                    Crear
                </x-button>
                @include('dashboard.discounts.partials.create-discount-modal')
            </div>
        </x-slot>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Código</th>
                        <th scope="col" class="px-6 py-3">Porcentaje</th>
                        <th scope="col" class="px-6 py-3">Activo</th>
                        <th scope="col" class="px-6 py-3">Usos Disponible</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($discounts as $discount)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $discount->id }}</th>
                            <td class="px-6 py-4">{{ $discount->name }}</td>
                            <td class="px-6 py-4">{{ $discount->code }}</td>
                            <td class="px-6 py-4">{{ $discount->percentage }}%</td>
                            <td class="px-6 py-4">{{ $discount->active ? 'Si' : 'No' }}</td>
                            <td class="px-6 py-4">{{ $discount->uses }}</td>
                            <td class="px-6 py-1 flex flex-col">
                                <a href="#" x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-discount-{{ $discount->id }}')" class="text-blue-600 hover:underline">
                                    Editar
                                </a>
                                @include('dashboard.discounts.partials.edit-discount-modal', ['discount' => $discount])
                                <form action="{{ route('dashboard.discounts.destroy', $discount) }}" method="POST" class="inline">
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