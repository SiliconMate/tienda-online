<x-modal name="edit-category-{{ $category->id }}" :show="$errors->any()" focusable>
    <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
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
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input id="name" class="block w-full" type="text" name="name" :value="$category->name" required autofocus>
                            Nombre
                        </x-input>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input id="slug" class="block w-full" type="text" name="slug" :value="$category->slug" required>
                            Slug
                        </x-input>
                        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                    </div>
                </div>
                <div class="mt-4">
                    <x-file-select id="image" class="block w-full" name="image">
                        Imagen
                    </x-file-select>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
                <div class="mt-4 flex items-center justify-center">
                    <img src="{{ asset("storage/categories/$category->path") }}" alt="{{ $category->name }}" class="h-32 object-cover rounded-md shadow-md" loading="lazy">
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