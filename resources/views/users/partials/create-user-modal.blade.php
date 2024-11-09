<x-modal name="create-user" :show="$errors->any()" focusable>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-plus text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Usuario</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 py-0 px-6">
                <div class="flex flex-row">
                    {{-- firstname --}}
                    <div class="w-1/2 ">
                        <x-input id="firstname" class="block w-full" type="text" name="firstname" :value="old('firstname')"
                            required autofocus>
                            Nombre
                        </x-input>
                        <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                    </div>
                    {{-- lastname --}}
                    <div class="w-1/2 pl-3">
                        <x-input id="lastname" class="block w-full" type="text" name="lastname" :value="old('lastname')"
                            required>
                            Apellido
                        </x-input>
                        <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                    </div>
                </div>
                {{-- username --}}
                <div class="w-full">
                    <x-input id="username" class="block w-full" type="text" name="username" :value="old('username')"
                        required>
                        Nombre de Usuario
                    </x-input>
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>
                {{-- email --}}
                <div class="w-full">
                    <x-input id="email" class="block w-full" type="email" name="email" :value="old('email')"
                        required>
                        Correo Electrónico
                    </x-input>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                {{-- phone --}}
                <div class="w-full">
                    <x-input id="phone" class="block w-full" type="text" name="phone" :value="old('phone')"
                        required>
                        Teléfono
                    </x-input>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
                <div class="flex flex-row">
                    {{-- password --}}
                    <div class="w-1/2 ">
                        <x-input id="password" class="block w-full" type="password" name="password" required>
                            Contraseña
                        </x-input>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    {{-- confirm password --}}
                    <div class="w-1/2 pl-3">
                        <x-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation"
                            required>
                            Confirmar Contraseña
                        </x-input>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
                {{-- imagen perfil --}}
                <div class="w-full">
                    <x-file-select id="avatar" class="block w-full" name="avatar">
                        Avatar
                    </x-file-select>
                    <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-end px-6 py-3 bg-gray-400">
                <x-button type="submit" style="primary">
                    Crear
                </x-button>
            </div>
        </div>
    </form>
</x-modal>
