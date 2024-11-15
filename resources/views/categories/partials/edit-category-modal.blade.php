<x-modal name="edit-category-{{ $category->id }}" :show="$errors->any()" focusable>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-edit text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Categoría</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 py-0 px-6">
                <div>
                    <x-input id="name" class="block w-full" type="text" name="name" :value="$category->name" required autofocus>
                        Nombre
                    </x-input>
                </div>
                <div class="mt-4">
                    <x-input id="slug" class="block w-full" type="text" name="slug" :value="$category->slug" required>
                        Slug
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