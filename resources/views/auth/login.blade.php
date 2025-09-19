<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end my-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <a href="{{ route('login.provider', ['provider' => 'google']) }}" class="flex items-center gap-2 justify-center border p-3 rounded-lg cursor-pointer hover:bg-blue-100 transition-all duration-300 font-bold mb-2">
            <img src="https://techdocs.akamai.com/identity-cloud/img/social-login/identity-providers/iconfinder-new-google-favicon-682665.png" alt="Google Icon" width="30">
            Sign in with Google
        </a>
        <a href="{{ route('login.provider', ['provider' => 'github']) }}" class="flex items-center gap-2 justify-center border p-3 rounded-lg cursor-pointer hover:bg-gray-100 transition-all duration-300 font-bold">
            <img src="https://images.icon-icons.com/3685/PNG/512/github_logo_icon_229278.png" alt="Google Icon" width="30">
            Sign in with Github
        </a>
    </form>
</x-guest-layout>
