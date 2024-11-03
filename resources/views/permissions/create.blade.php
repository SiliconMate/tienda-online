<x-app-layout>
    <x-section class="w-full">
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear permiso</h2>
                <x-button type="button" style='link'>
                    <a href="{{ route('permissions.index') }}">Volver</a>
                </x-button>
            </div>
        </x-slot>

        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <x-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus>
                            {{ __('Nombre') }}
                        </x-input>
                    </div>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button type="submit" style="primary">
                        {{ __('Guardar') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-section>
</x-app-layout>