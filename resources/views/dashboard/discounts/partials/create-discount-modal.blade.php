<x-modal name="create-discount" :show="$errors->any()" focusable>
    <form action="{{ route('dashboard.discounts.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-plus text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear descuento</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 py-0 px-6">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <x-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus>
                            Nombre
                        </x-input>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input id="code" class="block w-full" type="text" name="code" :value="old('code')" required>
                            Código
                        </x-input>
                        <x-input-error :messages="$errors->get('code')" class="mt-2" />
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <x-input id="percentage" class="block w-full" type="number" name="percentage" :value="old('percentage')" required>
                            Porcentaje
                        </x-input>
                        <x-input-error :messages="$errors->get('percentage')" class="mt-2" />
                    </div>
                    <div>
                        <x-input id="uses" class="block w-full" type="number" name="uses" :value="old('uses')" required>
                            Usos
                        </x-input>
                        <x-input-error :messages="$errors->get('uses')" class="mt-2" />
                    </div>
                </div>

                <div>
                    <x-checkbox id="active" name="active" value="1" :checked="old('active', false)">
                        Activo
                    </x-checkbox>
                    <x-input-error :messages="$errors->get('active')" class="mt-2" />
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