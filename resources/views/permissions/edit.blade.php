<x-app-layout>
    <x-section title="Edit Permission">
        <form method="POST" action="{{ route('permissions.update', $permission) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <div class="block">
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $permission->name }}" required autofocus>
                        {{ __('Name') }}
                    </x-input>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button type='submit'>Actualizar</x-button>
                </div>
            </div>
        </form>
    </x-section>
</x-app-layout>