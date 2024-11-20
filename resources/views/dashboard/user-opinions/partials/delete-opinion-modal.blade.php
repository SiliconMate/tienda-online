    <x-modal name="delete-opinion-{{ $opinion->id }}" :show="$errors->opinionDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('dashboard.useropinions.destroy', $opinion) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                ¿Estás seguro de que deseas eliminar esta opinión?
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Una vez que tu opinión sea eliminada, se eliminará permanentemente del sistema. Por favor, ingresa tu contraseña para confirmar que deseas eliminar esta opinión de forma permanente.
            </p>

            <div class="mt-6 flex justify-end">
                <x-button style='light' type="button" class="ms-3" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-button>

                <x-button style="danger" type="submit" class="mt-2">
                    Eliminar
                </x-button>
            </div>
        </form>
    </x-modal>
</section>