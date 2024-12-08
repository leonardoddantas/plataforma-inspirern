<x-guest-layout>

    <x-slot name="subheader">
        Acesse sua conta e vamos explorar o RN
    </x-slot>

    <x-slot name="linkURL">
        {{route('login')}}
    </x-slot>

    <x-slot name="linkText">
        Entrar
    </x-slot>

    <x-slot name="header">
        Crie sua Conta
    </x-slot>


    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Nome" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <!-- City -->
        <div class="mt-4">
            <select name="city" id="city" class="block mt-1 w-full p-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value=" ">Selecione sua cidade</option>
                @forelse ($cities as $city)
                    <option value="{{$city->name}}" {{ old("cities") == $city->name ? 'selected': ''}} >{{$city->name}}</option>
                @empty
                    <option value="">Nenhuma cidade selecionada</option>
                @endforelse
            </select>
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- Type -->
        <div class="mt-4">
            <select name="type" id="type" class="block mt-1 w-full p-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="" disabled selected>Selecione o tipo de usuário</option>
                <option value="turista" {{ old('type') == 'turista' ? 'selected' : '' }}>Turista</option>
                <option value="comerciante" {{ old('type') == 'comerciante' ? 'selected' : '' }}>Comerciante</option>
            </select>
            <x-input-error :messages="$errors->get('type')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="Senha"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"  placeholder="Confirme a Senha" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="mt-5 w-full">
            {{ __('Cadastrar-se') }}
        </x-primary-button>
    </form>
</x-guest-layout>
