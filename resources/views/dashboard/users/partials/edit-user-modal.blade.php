<x-modal name="edit-user-{{ $user->id }}" :show="$errors->any()" focusable>
    <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-edit text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Usuario</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 py-0 px-6">
                <div class="flex flex-row">
                    {{-- firstname --}}
                    <div class="w-1/2 ">
                        <x-input id="firstname" class="block w-full" type="text" name="firstname" :value="$user->firstname"
                            :required="false" autofocus>
                            Nombre
                        </x-input>
                        <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                    </div>
                    {{-- lastname --}}
                    <div class="w-1/2 pl-3">
                        <x-input id="lastname" class="block w-full" type="text" name="lastname" :value="$user->lastname"
                            :required="false">
                            Apellido
                        </x-input>
                        <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                    </div>
                </div>
                {{-- username --}}
                <div class="w-full">
                    <x-input id="username" class="block w-full" type="text" name="username" :value="$user->username"
                        :required="false">
                        Nombre de Usuario
                    </x-input>
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>
                {{-- email --}}
                <div class="w-full">
                    <x-input id="email" class="block w-full" type="email" name="email" :value="$user->email"
                        :required="false">
                        Correo Electrónico
                    </x-input>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                {{-- phone --}}
                <div class="w-full">
                    <x-input id="phone" class="block w-full" type="text" name="phone" :value="$user->phone"
                        :required="false">
                        Teléfono
                    </x-input>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
                <div class="flex flex-row">
                    {{-- password --}}
                    <div class="w-1/2 ">
                        <x-input id="password" class="block w-full" type="password" name="password" :required="false">
                            Contraseña
                        </x-input>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    {{-- confirm password --}}
                    <div class="w-1/2 pl-3">
                        <x-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation" :required="false">
                            Confirmar Contraseña
                        </x-input>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
                {{-- imagen perfil --}}
                <div class="w-full">
                    <x-file-select id="avatar" class="block w-full" name="avatar" :required="false">
                        Avatar
                    </x-file-select>
                    <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-end px-6 py-3 bg-gray-400">
                <x-button type="submit" style="primary">
                    Actualizar
                </x-button>
            </div>
        </div>
    </form>
</x-modal>