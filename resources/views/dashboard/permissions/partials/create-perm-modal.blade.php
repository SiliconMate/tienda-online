<x-modal name="create-perm" :show="$errors->any()" focusable>
    <form action="{{ route('dashboard.permissions.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-plus text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear permiso</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 py-0 px-6">
                <div>
                    <x-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus>
                        Nombre
                    </x-input>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
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