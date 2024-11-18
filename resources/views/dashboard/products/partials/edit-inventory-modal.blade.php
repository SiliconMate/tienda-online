<x-modal name="edit-inventory-{{$product->id}}" :show="$errors->any()" focusable>
    <form action="{{ route('dashboard.products.updateInventory', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-pencil text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Inventario</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 py-0 px-6">
                <div class="w-full">
                    <x-input id="storage_location" class="block w-full" type="text" name="storage_location" :value="old('storage_location', $product->inventory->location ?? 'N/A')" required>
                        Ubicación
                    </x-input>
                    <x-input-error :messages="$errors->get('storage_location')" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-input id="quantity" class="block w-full" type="number" name="quantity" :value="old('quantity', $product->inventory->quantity ?? 0)" required>
                        Cantidad
                    </x-input>
                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                </div>
                {{-- min_quantity --}}
                <div class="w-full">
                    <x-input id="min_quantity" class="block w-full" type="number" name="min_quantity" :value="old('min_quantity', $product->inventory->min_quantity ?? 0)" required>
                        Cantidad Mínima
                    </x-input>
                    <x-input-error :messages="$errors->get('min_quantity')" class="mt-2" />
                </div>
                {{-- max_quantity --}}
                <div class="w-full">
                    <x-input id="max_quantity" class="block w-full" type="number" name="max_quantity" :value="old('max_quantity', $product->inventory->max_quantity ?? 0)" required>
                        Cantidad Máxima
                    </x-input>
                    <x-input-error :messages="$errors->get('max_quantity')" class="mt-2" />
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