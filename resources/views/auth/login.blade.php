<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input type="email" name="email" :value="old('email')" aria-placeholder="Email" required autofocus autocomplete="email">
                {{ __('Email') }}
            </x-input>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input type="password" name="password" aria-placeholder="Password" required autofocus autocomplete="current-password">
                {{ __('Password') }}
            </x-input>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <x-checkbox name="remember"
                        id="remember_me"
                        value="{{ old('remember') }}"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                {{ __('Remember me') }}
            </x-checkbox>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <x-button style="link" type="button">
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </x-button>
            @endif

            <x-button style="primary" type="submit">
                {{ __('Log in') }}
            </x-button>
        </div>
        <div class="flex items-center justify-center mt-4">
            <x-button style="link" type="button">
                <a href="{{ route('register') }}">
                    No tienes una cuenta? Registrarse
                </a>
            </x-button>
        </div>
    </form>
</x-guest-layout>
