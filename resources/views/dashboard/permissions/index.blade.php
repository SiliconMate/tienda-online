<x-app-layout title="Permisos">
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Permisos</h2>
                
                <x-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-perm')">
                    Crear permiso
                </x-button>

                @include('dashboard.permissions.partials.create-perm-modal')
                
            </div>
        </x-slot>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Roles
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Usuarios
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $permission->name }}
                            </th>
                            <td class="px-6 py-4">
                                @foreach ($permission->roles as $role)
                                <span class="px-2 py-1 text-xs font-semibold leading-tight text-gray-700 bg-emerald-200 rounded-md dark:bg-emerald-700 dark:text-gray-100">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                @foreach ($permission->users as $user)
                                <span class="px-2 py-1 text-xs font-semibold leading-tight text-gray-700 bg-sky-200 rounded-md dark:bg-sky-700 dark:text-gray-100">{{ $user->username.' ('.$user->id.')' }}</span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 flex flex-col">

                                <a x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-perm-{{ $permission->id }}')" class="text-blue-600 hover:underline cursor-pointer">
                                    Editar
                                </a>
                
                                @include('dashboard.permissions.partials.edit-perm-modal', ['permission' => $permission])

                                <form action="{{ route('dashboard.permissions.destroy', $permission) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-section>
</x-app-layout>
