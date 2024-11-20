<x-modal name="edit-opinion-{{ $opinion->id }}" :show="$errors->any()" focusable>
    <form action="{{ route('dashboard.useropinions.update', $opinion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-edit text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Opinión</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 py-0 px-6">
                <div class="mt-4">
                    <x-textarea id="content" class="block w-full" name="content" required :value="$opinion->content">
                        Contenido
                    </x-textarea>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input id="rating" class="block w-full" type="number" name="rating" :value="$opinion->stars" required>
                        Estrellas
                    </x-input>
                    <x-input-error :messages="$errors->get('rating')" class="mt-2" />
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