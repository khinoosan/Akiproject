<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" /> <!-- Displays email errors -->
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" /> <!-- Displays password errors -->
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Google Login Button -->
    <div class="flex items-center justify-center mt-4">
    <a href="{{route('google-auth')}}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
        <svg class="w-5 h-5 me-2" fill="currentColor" viewBox="0 0 24 24">
            <path d="M23.494 12.253c0-.817-.073-1.598-.203-2.347H12v4.44h6.495a5.57 5.57 0 01-2.423 3.656v3.037h3.906c2.29-2.11 3.616-5.215 3.616-8.786z"/>
            <path d="M12 24c3.24 0 5.95-1.08 7.933-2.922l-3.906-3.037c-1.08.725-2.43 1.17-4.027 1.17-3.1 0-5.727-2.098-6.662-4.918H1.272v3.08A11.98 11.98 0 0012 24z"/>
            <path d="M5.338 14.293a7.157 7.157 0 01-.39-2.292c0-.797.14-1.566.39-2.292V6.629H1.272A11.985 11.985 0 000 12c0 1.99.475 3.87 1.272 5.371l4.066-3.078z"/>
            <path d="M12 4.867c1.717 0 3.253.592 4.469 1.755l3.284-3.284C17.949 1.056 15.24 0 12 0 7.272 0 3.15 2.654 1.272 6.629l4.066 3.08c.935-2.82 3.562-4.842 6.662-4.842z"/>
        </svg>
        {{ __('Log in with Google') }}
    </a>
</div>

    </form>
</x-guest-layout>