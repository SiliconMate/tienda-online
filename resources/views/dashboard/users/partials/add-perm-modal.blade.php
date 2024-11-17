<x-modal name="add-perm-{{ $user->id }}" :show="$errors->any()" focusable>
    <form action="{{ route('dashboard.users.addpermission', $user->id) }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-edit text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Agregar Permiso</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 py-0 px-6">
                <x-select-menu id="perm" name="perm" :options="Spatie\Permission\Models\Permission::all()->toArray()" key="name">
                    Permiso
                </x-select-menu>
            </div>

            <div class="flex items-center justify-end px-6 py-3 bg-gray-400">
                <x-button type="submit" style="primary">
                    Actualizar
                </x-button>
            </div>
        </div>
    </form>
</x-modal>