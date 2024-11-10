<x-app-layout>
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <img src="{{ asset("storage/avatars/".$user->avatar) }}" alt="avatar" class="w-24 h-24 rounded-md mr-4">
                    <div class="flex flex-col">
                        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">{{ $user->username }}</h2>
                        <p class="text-gray-500">{{ $user->firstname . " " . $user->lastname }}</p>
                    </div>
                </div>
                <x-button style="primary" type="button">
                    <a href="{{route('users.index')}}">Volver</a>
                </x-button>
            </div>
        </x-slot>

        <div class="mt-8">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">Información Personal</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">Detalles de la cuenta y perfil del usuario.</p>
                    </div>
                    <div class="border-t border-gray-200 dark:border-gray-700">
                        <dl>
                            <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nombre de Usuario</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:col-span-2">{{ $user->username }}</dd>
                            </div>
                            <div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:col-span-2">{{ $user->email }}</dd>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Roles</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:col-span-2">
                                    @foreach ($user->roles as $role)
                                    <span class="px-2 py-1 text-xs font-semibold leading-tight text-gray-700 bg-emerald-200 rounded-md dark:bg-emerald-700 dark:text-gray-100">{{ $role->name }}</span>
                                    @endforeach
                                </dd>
                            </div>
                            <div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Permisos</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:col-span-2">
                                    @foreach ($user->permissions as $permission)
                                    <span class="px-2 py-1 text-xs font-semibold leading-tight text-gray-700 bg-sky-200 rounded-md dark:bg-sky-700 dark:text-gray-100">{{ $permission->name }}</span>
                                    @endforeach
                                </dd>
                            </div>
                            {{-- ultima compra --}}
                            <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Última Compra</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:col-span-2">
                                    @if ($user->orderDetails->isNotEmpty())
                                    <span>{{ $user->orderDetails->sortByDesc('created_at')->first()->created_at->format('d/m/Y') }}</span>
                                    @else
                                    <span>No hay compras</span>
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </x-section>
</x-app-layout>