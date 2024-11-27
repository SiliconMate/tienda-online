<x-app-layout>
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Direcciones</h2>
                <x-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-address')">
                    Crear
                </x-button>
                @include('dashboard.user-addresses.partials.create-address-modal')
            </div>
        </x-slot>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Dirección</th>
                        <th scope="col" class="px-6 py-3">Código Postal</th>
                        <th scope="col" class="px-6 py-3">Ciudad</th>
                        <th scope="col" class="px-6 py-3">País</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($addresses as $address)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $address->id }}</th>
                            <td class="px-6 py-4">{{ $address->address_line }}</td>
                            <td class="px-6 py-4">{{ $address->postal_code }}</td>
                            <td class="px-6 py-4">{{ $address->city }}</td>
                            <td class="px-6 py-4">{{ $address->country }}</td>
                            <td class="px-6 py-1 flex flex-col">
                                <a href="#" x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-address-{{ $address->id }}')" class="text-blue-600 hover:underline">
                                    Editar
                                </a>
                                @include('dashboard.user-addresses.partials.edit-address-modal', ['address' => $address])

                                <a href="#" x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete-address-{{ $address->id }}')" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    Eliminar
                                </a>
                                @include('dashboard.user-addresses.partials.delete-address-modal', ['address' => $address])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-section>
</x-app-layout>