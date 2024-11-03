<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- firstname and lastname -->
        <div class="grid grid-cols-2 gap-4">
            <x-input type="text" name="firstname" :value="old('firstname')" aria-placeholder="First Name" required autofocus autocomplete="firstname">
                {{ __('First Name') }}
            </x-input>
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
            
            <x-input type="text" name="lastname" :value="old('lastname')" aria-placeholder="Last Name" required autofocus autocomplete="lastname">
                {{ __('Last Name') }}
            </x-input>
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>
        
        <!-- Username -->
        <div class="">
            <x-input type="text" name="username" :value="old('username')" aria-placeholder="Username" required autofocus autocomplete="username">
                {{ __('Username') }}
            </x-input>
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="">
            <x-input type="email" name="email" :value="old('email')" aria-placeholder="Email" required autofocus autocomplete="email">
                {{ __('Email') }}
            </x-input>
        </div>

        <!-- Phone -->
        <div class="">
            <x-input type="text" name="phone" :value="old('phone')" aria-placeholder="Phone" required autofocus autocomplete="phone">
                {{ __('Phone') }}
            </x-input>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="">
            <x-input type="password" name="password" aria-placeholder="Password" required autofocus autocomplete="new-password">
                {{ __('Password') }}
            </x-input>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="">
            <x-input type="password" name="password_confirmation" aria-placeholder="Confirm Password" required autofocus autocomplete="new-password">
                {{ __('Confirm Password') }}
            </x-input>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button type="button" style="link">
                <a href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </x-button>

            <x-button type="submit" style="primary">
                {{ __('Register') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
