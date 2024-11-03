<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input type="email" name="email" :value="old('email', $request->email)" aria-placeholder="Email" required autofocus autocomplete="email">
                {{ __('Email') }}
            </x-input>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input type="password" name="password" aria-placeholder="Password" required autofocus autocomplete="new-password">
                {{ __('Password') }}
            </x-input>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input type="password" name="password_confirmation" aria-placeholder="Confirm Password" required autofocus autocomplete="new-password">
                {{ __('Confirm Password') }}
            </x-input>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button style="primary" type="submit">
                {{ __('Reset Password') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
