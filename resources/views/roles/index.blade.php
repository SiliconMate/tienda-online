<x-app-layout title="Roles">
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Roles</h2>

                <x-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-role')">
                    Crear Rol
                </x-button>

                @include('roles.partials.create-role-modal')

            </div>
        </x-slot>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Permisos</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $role->id }}</th>
                            <td class="px-6 py-4">{{ $role->name }}</td>
                            <td class="px-6 py-4">
                                @foreach ($role->permissions as $permission)
                                    <span
                                        class="px-2 py-1 text-xs font-semibold leading-tight text-gray-700 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-100">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-role-{{ $role->id }}')" class="text-blue-600 hover:underline">
                                    Editar
                                </button>

                                @include('roles.partials.edit-role-modal', ['role' => $role])
                                
                                <form action="{{ route('roles.destroy', $role) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-section>
</x-app-layout>
