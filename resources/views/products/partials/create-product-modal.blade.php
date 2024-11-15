<x-modal name="create-product" :show="$errors->any()" focusable>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-plus text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Producto</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 py-0 px-6">
                {{-- name --}}
                <div class="w-full">
                    <x-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus>
                        Nombre
                    </x-input>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                {{-- description --}}
                <div class="w-full">
                    <x-input id="description" class="block w-full" type="text" name="description" :value="old('description')" required>
                        Descripción
                    </x-input>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                {{-- price --}}
                <div class="w-full">
                    <x-input id="price" class="block w-full" type="number" name="price" :value="old('price')" required>
                        Precio
                    </x-input>
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
                {{-- code --}}
                <div class="w-full">
                    <x-input id="code" class="block w-full" type="text" name="code" :value="old('code')" required>
                        Código
                    </x-input>
                    <x-input-error :messages="$errors->get('code')" class="mt-2" />
                </div>
                {{-- category id --}}
                <div class="w-full">
                    <x-select-menu id="category_id" class="block w-full" name="category_id" :options="\App\Models\Category::all()->toArray()" key="name">
                        Categoría
                    </x-select-menu>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>
                {{-- imagen --}}
                <div class="w-full">
                    <x-file-select id="image" class="block w-full" name="image">
                        Imagen
                    </x-file-select>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
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