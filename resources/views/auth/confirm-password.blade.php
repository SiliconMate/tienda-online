<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input type="password" name="password" aria-placeholder="Password" required autofocus autocomplete="current-password">
                {{ __('Password') }}
            </x-input>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-button style="primary" type="submit">
                {{ __('Confirm') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
