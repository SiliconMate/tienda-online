<x-modal name="edit-user-{{ $user->id }}" :show="$errors->any()" focusable>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
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
                <div>
                    <x-input id="name" class="block w-full" type="text" name="name" :value="$user->name" required autofocus>
                        Nombre
                    </x-input>
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