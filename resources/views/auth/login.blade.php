<x-guest-layout>

    <x-slot name="subheader">
        Acesse sua conta e vamos explorar o RN
    </x-slot>
    
    <x-slot name="linkURL">
        {{route('register')}}
    </x-slot>

    <x-slot name="linkText">
        Cadastrar-se
    </x-slot>

    <x-slot name="header">
        Acesse sua Conta
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class=" mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-text-input id="email" class="block mt-1 w-full bg-gray-100" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">

            <x-text-input id="password" class="block mt-1 w-full bg-gray-100" type="password" name="password" placeholder="Senha" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">

            <!-- Remember Me -->
            <div>
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar de mim') }}</span>
                </label>
            </div>

            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Esqueceu sua senha?') }}
            </a>
            @endif
        </div>

        <x-primary-button class="mt-5 w-full">
            {{ __('Entrar') }}
        </x-primary-button>
    </form>
</x-guest-layout>