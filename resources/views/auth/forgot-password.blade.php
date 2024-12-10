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
        Redefina sua senha
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um e-mail com um link de redefinição de senha que permitirá que você escolha uma nova.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Enviar link de redifinição de senha') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
