<x-guest-layout>

    <x-slot name="subheader">
        Cadastre seu negócio e alavanque seus resultados!
    </x-slot>

    <x-slot name="linkURL">
        {{ route('dashboard') }}
    </x-slot>

    <x-slot name="linkText">
        Dashboard
    </x-slot>

    <x-slot name="header">
        Cadastre seu Negócio
    </x-slot>

    <div>
        <form method="POST" action="{{ route('register') }}" class="w-full">
            @csrf

            <div id="step-1" class="form-step w-full">
                <div class="text-xl mb-4">Informações básicas</div>

                <div class="mb-4">
                    <x-text-input id="businessName" class="block mt-1 w-full bg-gray-100" type="text" name="businessName" :value="old('businessName')" placeholder="Nome do negócio" required autofocus />
                    <x-input-error :messages="$errors->get('businessName')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="category" class="block mt-1 w-full bg-gray-100" type="text" name="category" :value="old('category')" placeholder="Categoria" required autocomplete="category" />
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="cnpj" class="block mt-1 w-full bg-gray-100" type="text" name="cnpj" :value="old('cnpj')" placeholder="CNPJ" autocomplete="cnpj" />
                    <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <textarea id="description" name="description" rows="5" class="block w-full mt-1 bg-gray-100 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Digite uma descrição..." required></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="flex justify-end">
                    <x-primary-button type="button" onclick="nextStep(2)">Próximo</x-primary-button>
                </div>
            </div>

            <div id="step-2" class="form-step w-full hidden">
                <div class="text-xl mb-4">Informações de Contato</div>

                <div class="mb-4">
                    <x-text-input id="phone" class="block mt-1 w-full bg-gray-100" type="text" name="phone" :value="old('phone')" placeholder="Telefone" required />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-100" type="email" name="email" :value="old('email')" placeholder="Email" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="websiteURL" class="block mt-1 w-full bg-gray-100" type="text" name="websiteURL" :value="old('websiteURL')" placeholder="URL do site" />
                    <x-input-error :messages="$errors->get('websiteURL')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <textarea id="socialMedia" name="socialMedia" rows="5" class="block w-full mt-1 bg-gray-100 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="@ das redes sociais..."></textarea>
                    <x-input-error :messages="$errors->get('socialMedia')" class="mt-2" />
                </div>

                <div class="flex justify-between">
                    <x-primary-button type="button" onclick="previousStep(1)">Voltar</x-primary-button>
                    <x-primary-button type="button" onclick="nextStep(3)">Próximo</x-primary-button>
                </div>
            </div>

            <div id="step-3" class="form-step w-full hidden">
                <div class="text-xl mb-4">Localização</div>

                <div class="mb-4">
                    <x-text-input id="road" class="block mt-1 w-full bg-gray-100" type="text" name="road" :value="old('road')" placeholder="Rua" required />
                    <x-input-error :messages="$errors->get('road')" class="mt-2" />
                </div>

                <div class="flex justify-between w-full">
                    <div class="mb-4">
                        <x-text-input id="number" class="block mt-1 w-full bg-gray-100" type="text" name="number" :value="old('number')" placeholder="Número" required />
                        <x-input-error :messages="$errors->get('number')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-text-input id="cep" class="block mt-1 w-full bg-gray-100" type="text" name="cep" :value="old('cep')" placeholder="CEP" required />
                        <x-input-error :messages="$errors->get('cep')" class="mt-2" />
                    </div>
                </div>

                <div class="mb-4">
                    <x-text-input id="neighborhood" class="block mt-1 w-full bg-gray-100" type="text" name="neighborhood" :value="old('neighborhood')" placeholder="Bairro" required />
                    <x-input-error :messages="$errors->get('neighborhood')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="city" class="block mt-1 w-full bg-gray-100" type="text" name="city" :value="old('city')" placeholder="Cidade" required />
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="state" class="block mt-1 w-full bg-gray-100" type="text" name="state" :value="old('state')" placeholder="Estado" required />
                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                </div>

                <div class="flex justify-between">
                    <x-primary-button type="button" onclick="previousStep(2)">Voltar</x-primary-button>
                    <x-primary-button type="button" onclick="nextStep(4)">Próximo</x-primary-button>
                </div>
            </div>

            <div id="step-4" class="form-step w-full hidden">
                <div class="text-xl mb-4">Detalhes Adicionais</div>

                <div class="mb-4">
                    <x-text-input id="operatingDays" class="block mt-1 w-full bg-gray-100" type="text" name="operatingDays" :value="old('operatingDays')" placeholder="Dias de funcionamento" required />
                    <x-input-error :messages="$errors->get('operatingDays')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="operatingHours" class="block mt-1 w-full bg-gray-100" type="text" name="operatingHours" :value="old('operatingHours')" placeholder="Horário de funcionamento" required />
                    <x-input-error :messages="$errors->get('operatingHours')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="locationPhoto" class="block mt-1 w-full bg-gray-100" type="file" name="locationPhoto" :value="old('locationPhoto')" placeholder="Fotos do local" required />
                    <x-input-error :messages="$errors->get('locationPhoto')" class="mt-2" />
                </div>

                <div class="flex justify-between">
                    <x-primary-button type="button" onclick="previousStep(3)">Voltar</x-primary-button>
                    <x-primary-button type="button" onclick="nextStep(5)">Próximo</x-primary-button>
                </div>
            </div>

            <div id="step-5" class="form-step w-full hidden">
                <div class="text-xl mb-4">Informações do Proprietário</div>

                <div class="mb-4">
                    <x-text-input id="ownerName" class="block mt-1 w-full bg-gray-100" type="text" name="ownerName" :value="old('ownerName')" placeholder="Nome" required />
                    <x-input-error :messages="$errors->get('ownerName')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="ownerTelephone" class="block mt-1 w-full bg-gray-100" type="text" name="ownerTelephone" :value="old('ownerTelephone')" placeholder="Telefone" required />
                    <x-input-error :messages="$errors->get('ownerTelephone')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="ownerEmail" class="block mt-1 w-full bg-gray-100" type="text" name="ownerEmail" :value="old('ownerEmail')" placeholder="Email" required />
                    <x-input-error :messages="$errors->get('ownerEmail')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="ownerCpf" class="block mt-1 w-full bg-gray-100" type="text" name="ownerCpf" :value="old('ownerCpf')" placeholder="CPF" required />
                    <x-input-error :messages="$errors->get('ownerCpf')" class="mt-2" />
                </div>

                <div class="flex justify-between">
                    <x-primary-button type="button" onclick="previousStep(4)">Voltar</x-primary-button>
                    <x-primary-button type="submit">Enviar</x-primary-button>
                </div>
            </div>

        </form>
    </div>

    <script>
        function nextStep(step) {
            document.querySelectorAll('.form-step').forEach(element => {
                element.classList.add('hidden');
            });
            document.getElementById('step-' + step).classList.remove('hidden');
        }

        function previousStep(step) {
            document.querySelectorAll('.form-step').forEach(element => {
                element.classList.add('hidden');
            });
            document.getElementById('step-' + step).classList.remove('hidden');
        }
    </script>

</x-guest-layout>
