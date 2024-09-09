<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" style="background-color: #f9f9f9; padding: 20px; border-radius: 8px; max-width: 400px; margin: 60px auto 0 auto; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        @csrf

        <!-- Email Address -->
        <div style="margin-bottom: 16px;">
            <x-input-label for="email" :value="__('Email')" style="font-weight: bold;" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="border: 1px solid #ccc; padding: 10px; border-radius: 4px; width: 100%;" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red;" />
        </div>

        <!-- Password -->
        <div style="margin-bottom: 16px;">
            <x-input-label for="password" :value="__('Password')" style="font-weight: bold;" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password"
                          style="border: 1px solid #ccc; padding: 10px; border-radius: 4px; width: 100%;" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red;" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4" style="margin-bottom: 16px;">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4" style="display: flex; justify-content: space-between; align-items: center;">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" style="text-decoration: underline; color: #4A5568;">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3" style="background-color: #4A90E2; color: white; padding: 10px 20px; border-radius: 4px; border: none; cursor: pointer;">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
