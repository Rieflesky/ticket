<x-guest-layout>
    <x-authentication-card class="bg-white opacity-90 rounded-xl p-8 w-96">
        <x-slot name="logo">
            <img src="img/Logo1.png" alt="" style="width: 150px; height: 150px; auto;">
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mb-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="mb-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" class="mr-2" />
                    <span class="text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mb-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <x-button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline flex items-center justify-center">
                <span class="mx-auto">{{ __('Log in') }}</span>
            </x-button>
        </form>

        <div class="mt-4 text-center">
            <span class="text-sm text-gray-600">{{ __('OR') }}</span>
        </div>

        <div class="mt-4 text-center">
            <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                {{ __('Do not have any account?') }}
            </a>
        </div>
    </x-authentication-card>
</x-guest-layout>
