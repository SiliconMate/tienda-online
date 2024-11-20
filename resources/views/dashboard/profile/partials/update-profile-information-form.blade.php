<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('dashboard.profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex flex-row gap-4">
            <div class="w-1/2">
                <x-input type="text" name="firstname" :value="old('firstname', $user->firstname)" aria-placeholder="First Name" required autofocus autocomplete="firstname">
                    {{ __('First Name') }}
                </x-input>
                <x-input-error :messages="$errors->updateProfileInformation->get('firstname')" class="mt-2" />
            </div>
    
            <div class="w-1/2">
                <x-input type="text" name="lastname" :value="old('lastname', $user->lastname)" aria-placeholder="Last Name" required autofocus autocomplete="lastname">
                    {{ __('Last Name') }}
                </x-input>
                <x-input-error :messages="$errors->updateProfileInformation->get('lastname')" class="mt-2" />
            </div>
        </div>

        <div>
            <x-input type="text" name="username" :value="old('username', $user->username)" aria-placeholder="Username" required autofocus autocomplete="username">
                {{ __('Username') }}
            </x-input>
            <x-input-error :messages="$errors->updateProfileInformation->get('username')" class="mt-2" />
        </div>

        <div>
            <x-input type="text" name="phone" :value="old('phone', $user->phone)" aria-placeholder="phone" :required="false" autofocus autocomplete="phone">
                {{ __('Phone') }}
            </x-input>
            {{-- <x-input-error :messages="$errors->updateProfileInformation->get('phone')" class="mt-2" /> --}}
            @error('phone')
                <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <x-input type="email" name="email" :value="old('email', $user->email)" aria-placeholder="Email" required autofocus autocomplete="email">
                {{ __('Email') }}
            </x-input>
            <x-input-error :messages="$errors->updateProfileInformation->get('email')" class="mt-2" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-button type="submit" style="primary">{{ __('Save') }}</x-button>

            @if (session('status') === 'profile-updated')
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
