<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-slate-300" />
            <x-text-input id="name"
                class="block mt-1 w-full bg-white/5 border-white/10 text-white focus:border-blue-500 focus:ring-blue-500"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-slate-300" />
            <x-text-input id="email"
                class="block mt-1 w-full bg-white/5 border-white/10 text-white focus:border-blue-500 focus:ring-blue-500"
                type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-slate-300" />

            <x-text-input id="password"
                class="block mt-1 w-full bg-white/5 border-white/10 text-white focus:border-blue-500 focus:ring-blue-500"
                type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-slate-300" />

            <x-text-input id="password_confirmation"
                class="block mt-1 w-full bg-white/5 border-white/10 text-white focus:border-blue-500 focus:ring-blue-500"
                type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-slate-400 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 bg-blue-600 hover:bg-blue-500 focus:ring-blue-500 border-transparent">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>