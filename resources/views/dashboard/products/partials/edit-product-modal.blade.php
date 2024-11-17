<x-modal name="edit-product-{{$product->id}}" :show="$errors->any()" focusable>
    <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-pencil text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Producto</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 py-0 px-6">
                {{-- name --}}
                <div class="w-full">
                    <x-input id="name" class="block w-full" type="text" name="name" :value="old('name', $product->name)" required autofocus>
                        Nombre
                    </x-input>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                {{-- description --}}
                <div class="w-full">
                    <x-textarea class="block w-full" name="description" :value="old('description', $product->description)" rows="3" required>
                        Descripción
                    </x-textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div class="grid grid-cols-2 gap-3">
                    {{-- price --}}
                    <div class="w-full">
                        <x-input id="price" class="block w-full" type="number" name="price" :value="old('price', $product->price)" required>
                            Precio
                        </x-input>
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>
                    {{-- code --}}
                    <div class="w-full">
                        <x-input id="code" class="block w-full" type="text" name="code" :value="old('code', $product->code)" required>
                            Código
                        </x-input>
                        <x-input-error :messages="$errors->get('code')" class="mt-2" />
                    </div>
                </div>
                {{-- category id --}}
                <div class="w-full">
                    <div>
                        <label for="category_id" class="block text-sm font-semibold mb-2 text-gray-600">
                            Categoría
                        </label>
                        <select
                          id="category_id"
                          name="category_id"
                          class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-200">
                          @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                              {{ $category->name }}
                            </option>
                          @endforeach
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>
                {{-- iamgenes --}}
                <div class="w-full mt-2">
                    <x-file-select id="image" class="block w-full" name="image[]" multiple :required="false">
                        Imagenes
                    </x-file-select>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
                
                <div class="grid grid-cols-3 gap-3 mt-3">
                    @foreach ($product->images as $image)
                        <div class="relative group">
                            <img src="{{ asset('storage/products/' . $image->path) }}" alt="{{ $product->name }}" class="w-full h-24 object-cover rounded-md shadow-md" loading="lazy">
                        </div>
                    @endforeach
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