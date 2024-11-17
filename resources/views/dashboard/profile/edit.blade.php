<x-app-layout title="Editar Perfil">
    <x-section title="Editar Perfil">
        <div class="max-w-xl">
            @include('dashboard.profile.partials.update-profile-information-form')
        </div>
    </x-section>
    <x-section title="Cambiar Contraseña">
        <div class="max-w-xl">
            @include('dashboard.profile.partials.update-password-form')
        </div>
    </x-section>
    <x-section title="Eliminar Usuario">
        <div class="max-w-xl">
            @include('dashboard.profile.partials.delete-user-form')
        </div>
    </x-section>
</x-app-layout>