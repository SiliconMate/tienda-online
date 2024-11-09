<x-app-layout title="Usuarios">
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Usuarios</h2>
                
                <x-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-user')">
                    Crear Usuario
                </x-button>

                @include('users.partials.create-user-modal')

            </div>
        </x-slot>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Nombre Usuario</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Roles</th>
                        <th scope="col" class="px-6 py-3">Permisos</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->id }}</th>
                            <td class="px-6 py-4">{{ $user->username }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @foreach ($user->roles as $role)
                                    <span class="px-2 py-1 text-xs font-semibold leading-tight text-gray-700 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-100">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                @foreach ($user->permissions as $permission)
                                    <span class="px-2 py-1 text-xs font-semibold leading-tight text-gray-700 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-100">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td class="px-6 py-1 flex flex-col">
                                
                                <a href="{{ route('users.show', $user) }}" class="text-blue-600 hover:underline">Detallar</a>
                                
                                <a href="#" x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-user-{{ $user->id }}')" class="text-blue-600 hover:underline">
                                    Editar
                                </a>
                                @include('users.partials.edit-user-modal', ['user' => $user])
                                
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
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
