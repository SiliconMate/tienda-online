<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Actualizar Avatar
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Carga una nueva imagen de perfil para cambiar tu avatar.
        </p>
    </header>

    <form method="post" action="{{ route('dashboard.profile.updateavatar') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-file-select name="avatar" accept="image/*" required>
                {{ __('Avatar') }}
            </x-file-select>
            <x-input-error :messages="$errors->updateAvatar->get('avatar')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-button type="submit" style="primary">{{ __('Save') }}</x-button>

            @if (session('status') === 'avatar-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
