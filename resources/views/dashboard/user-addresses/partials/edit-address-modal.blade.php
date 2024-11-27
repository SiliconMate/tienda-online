<x-modal name="edit-address-{{ $address->id }}" :show="$errors->any()" focusable>
    <form action="{{ route('dashboard.useraddresses.update', $address->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-pencil text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Dirección</h2>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 py-0 px-6">
            <div class="mt-4">
                <x-input id="address_line" class="block w-full" type="text" name="address_line" value="{{ $address->address_line }}" required>
                    Dirección
                </x-input>
                <x-input-error :messages="$errors->get('address_line')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input id="postal_code" class="block w-full" type="text" name="postal_code" value="{{ $address->postal_code }}" required>
                    Código Postal
                </x-input>
                <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input id="country" class="block w-full" type="text" name="country" value="{{ $address->country }}" required>
                    País
                </x-input>
                <x-input-error :messages="$errors->get('country')" class="mt-2" />
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div class="mt-4">
                    <x-input id="city" class="block w-full" type="text" name="city" value="{{ $address->city }}" required>
                        Ciudad
                    </x-input>
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input id="state" class="block w-full" type="text" name="state" value="{{ $address->state }}" required>
                        Estado/Provincia
                    </x-input>
                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                </div>
            </div>
            <div class="mt-4">
                <x-input id="phone" class="block w-full" type="text" name="phone" value="{{ $address->phone }}" required>
                    Teléfono
                </x-input>
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-textarea id="comment" class="block w-full" name="comment" :value="old('comment') ?? ''">
                    Comentario
                </x-textarea>
                <x-input-error :messages="$errors->get('comment')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-end px-6 py-3 bg-gray-400">
            <x-button type="submit" style="primary">
                Guardar
            </x-button>
        </div>
    </form>
</x-modal>