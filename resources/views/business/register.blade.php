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
        <form method="POST" action="{{ route('business.store') }}" class="w-full" enctype="multipart/form-data">
            @csrf

            {{-- basic information --}}
            <div id="step-1" class="form-step w-full">
                <div class="text-xl mb-4">Informações básicas</div>

                <div class="mb-4">
                    <x-text-input id="businessName" class="block mt-1 w-full bg-gray-100" type="text" name="businessName" :value="old('businessName')" placeholder="Nome do negócio" autofocus />
                    <x-input-error :messages="$errors->get('businessName')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="category" class="block mt-1 w-full bg-gray-100" type="text" name="category" :value="old('category')" placeholder="Categoria" autocomplete="category" />
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="cnpj" class="block mt-1 w-full bg-gray-100" type="text" name="cnpj" :value="old('cnpj')" placeholder="CNPJ" autocomplete="cnpj" maxlength="18"  />
                    <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <textarea id="description" name="description" rows="5" value="old('description')" class="block w-full mt-1 bg-gray-100 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Digite uma descrição" ></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="flex justify-end">
                    <x-primary-button type="button" onclick="nextStep(2)">Próximo</x-primary-button>
                </div>
            </div>

             {{-- contact information --}}
            <div id="step-2" class="form-step w-full hidden">
                <div class="text-xl mb-4">Informações de Contato</div>

                <div class="mb-4">
                    <x-text-input id="phone" class="block mt-1 w-full bg-gray-100" type="text" name="phone" :value="old('phone')" placeholder="Telefone" maxlength="20"/>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-100" type="email" name="email" :value="old('email')" placeholder="Email"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <div class="mb-4">
                    <x-text-input id="websiteURL" class="block mt-1 w-full bg-gray-100" type="text" name="websiteURL" :value="old('websiteURL')" placeholder="URL do site" />
                    <x-input-error :messages="$errors->get('websiteURL')" class="mt-2" />
                </div>

                <div class="flex justify-between">
                    <x-primary-button type="button" onclick="previousStep(1)">Voltar</x-primary-button>
                    <x-primary-button type="button" onclick="nextStep(3)">Próximo</x-primary-button>
                </div>
            </div>

            {{-- social media --}}
             <div id="step-3" class="form-step w-full hidden max-h-96 overflow-y-auto">
                <div class="text-xl mb-4">Redes Sociais</div>

                <div class="mb-4">
                    <x-text-input id="facebook" class="block mt-1 w-full bg-gray-100" type="text" name="facebook" :value="old('facebook')" placeholder="Link do Facebook" />
                    <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="instagram" class="block mt-1 w-full bg-gray-100" type="text" name="instagram" :value="old('instagram')" placeholder="Link do Instagram" />
                    <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="whatsapp" class="block mt-1 w-full bg-gray-100" type="text" name="whatsapp" :value="old('whatsapp')" placeholder="Link do WhatsApp" />
                    <x-input-error :messages="$errors->get('whatsapp')" class="mt-2" />
                </div>

                <div id="additionalSocialMediaContainer"></div>

                <div class="mb-4">
                    <button type="button" onclick="addSocialMediaField()" class="w-full bg-gray-700 text-white px-4 py-2 rounded">Adicionar Outra Rede Social</button>
                </div>

                <div class="flex justify-between">
                    <x-primary-button type="button" onclick="previousStep(2)">Voltar</x-primary-button>
                    <x-primary-button type="button" onclick="nextStep(4)">Próximo</x-primary-button>
                </div>
            </div>

            {{-- location --}}
            <div id="step-4" class="form-step w-full hidden">
                <div class="text-xl mb-4">Localização</div>

                <div class="mb-4">
                    <x-text-input id="road" class="block mt-1 w-full bg-gray-100" type="text" name="road" :value="old('road')" placeholder="Rua"/>
                    <x-input-error :messages="$errors->get('road')" class="mt-2" />
                </div>

                <div class="flex justify-between w-full">
                    <div class="mb-4">
                        <x-text-input id="number" class="block mt-1 w-full bg-gray-100" type="text" name="number" :value="old('number')" placeholder="Número"/>
                        <x-input-error :messages="$errors->get('number')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-text-input id="cep" class="block mt-1 w-full bg-gray-100" type="text" name="cep" :value="old('cep')" placeholder="CEP" maxlength="9" />
                        <x-input-error :messages="$errors->get('cep')" class="mt-2" />
                    </div>
                </div>

                <div class="mb-4">
                    <x-text-input id="neighborhood" class="block mt-1 w-full bg-gray-100" type="text" name="neighborhood" :value="old('neighborhood')" placeholder="Bairro"/>
                    <x-input-error :messages="$errors->get('neighborhood')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="city" class="block mt-1 w-full bg-gray-100" type="text" name="city" :value="old('city')" placeholder="Cidade"/>
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="state" class="block mt-1 w-full bg-gray-100" type="text" name="state" :value="old('state')" placeholder="Estado"/>
                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                </div>

                <div class="flex justify-between">
                    <x-primary-button type="button" onclick="previousStep(3)">Voltar</x-primary-button>
                    <x-primary-button type="button" onclick="nextStep(5)">Próximo</x-primary-button>
                </div>
            </div>

            {{-- additional details --}}
            <div id="step-5" class="form-step w-full hidden">
                <div class="text-xl mb-4">Detalhes Adicionais</div>

               <div class="mb-4">
                    <div class="text-base mb-4">Dias e Horários de Funcionamento</div>
                    @foreach(['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'] as $day)
                        <div class="mb-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="operatingDays[]" value="{{ $day }}" class="form-checkbox h-5 w-5 text-gray-700" id="checkbox-{{ strtolower($day) }}" onchange="toggleTimeInputs('{{ strtolower($day) }}')">
                                <span class="ml-2">{{ $day }}</span>
                            </label>
                            <div class="grid grid-cols-2 gap-4 mt-2 hidden time-inputs" id="time-inputs-{{ strtolower($day) }}">
                                <div>
                                    <label for="openingTime-{{ strtolower($day) }}" class="block text-sm font-medium text-gray-700">Abertura</label>
                                    <input id="openingTime-{{ strtolower($day) }}" class="block mt-1 w-full bg-gray-100 p-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="time" name="openingTime[{{ strtolower($day) }}]" />
                                </div>
                                <div>
                                    <label for="closingTime-{{ strtolower($day) }}" class="block text-sm font-medium text-gray-700">Fechamento</label>
                                    <input id="closingTime-{{ strtolower($day) }}" class="block mt-1 w-full bg-gray-100 p-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="time" name="closingTime[{{ strtolower($day) }}]" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <x-input-error :messages="$errors->get('operatingDays')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="locationPhoto" class="block mt-1 w-full bg-gray-100" type="file" name="locationPhoto" :value="old('locationPhoto')" placeholder="Fotos do local"/>
                    <x-input-error :messages="$errors->get('locationPhoto')" class="mt-2" />
                </div>

                <div class="flex justify-between">
                    <x-primary-button type="button" onclick="previousStep(4)">Voltar</x-primary-button>
                    <x-primary-button type="button" onclick="nextStep(6)">Próximo</x-primary-button>
                </div>
            </div>

            {{-- owner information --}}
            <div id="step-6" class="form-step w-full hidden">
                <div class="text-xl mb-4">Informações do Proprietário</div>

                <div class="mb-4">
                    <x-text-input id="ownerName" class="block mt-1 w-full bg-gray-100" type="text" name="ownerName" :value="old('ownerName')" placeholder="Nome" />
                    <x-input-error :messages="$errors->get('ownerName')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="ownerTelephone" class="block mt-1 w-full bg-gray-100" type="text" name="ownerTelephone" :value="old('ownerTelephone')" placeholder="Telefone" maxlength="20" />
                    <x-input-error :messages="$errors->get('ownerTelephone')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="ownerEmail" class="block mt-1 w-full bg-gray-100" type="email" name="ownerEmail" :value="old('ownerEmail')" placeholder="Email" />
                    <x-input-error :messages="$errors->get('ownerEmail')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text-input id="ownerCpf" class="block mt-1 w-full bg-gray-100" type="text" name="ownerCpf" :value="old('ownerCpf')" placeholder="CPF" maxlength="14" />
                    <x-input-error :messages="$errors->get('ownerCpf')" class="mt-2" />
                </div>

                <div class="flex justify-between">
                    <x-primary-button type="button" onclick="previousStep(5)">Voltar</x-primary-button>
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

         function addSocialMediaField() {
            var container = document.getElementById('additionalSocialMediaContainer');
            var newField = document.createElement('div');
            newField.className = 'mb-4';

            var inputName = document.createElement('input');
            inputName.className = 'block mt-1 w-full bg-gray-100 p-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm';
            inputName.type = 'text';
            inputName.name = 'socialMediaNames[]';
            inputName.placeholder = 'Nome da Rede Social';
            newField.appendChild(inputName);

            var inputURL = document.createElement('input');
            inputURL.className = 'block mt-1 w-full bg-gray-100 p-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-4';
            inputURL.type = 'text';
            inputURL.name = 'socialMediaURLs[]';
            inputURL.placeholder = 'URL do Perfil';
            newField.appendChild(inputURL);

            container.appendChild(newField);
        }

    </script>

    <script>
       
        function applyCnpjMask(input) {
            let value = input.value.replace(/\D/g, ''); 
            let formattedValue = '';

            if (value.length > 14) {
                value = value.slice(0, 14);
            }

            if (value.length > 0) {
                if (value.length <= 2) {
                    formattedValue = value.replace(/^(\d{0,2})/, '$1');
                } else if (value.length <= 5) {
                    formattedValue = value.replace(/^(\d{2})(\d{0,3})/, '$1.$2');
                } else if (value.length <= 8) {
                    formattedValue = value.replace(/^(\d{2})(\d{3})(\d{0,3})/, '$1.$2.$3');
                } else if (value.length <= 12) {
                    formattedValue = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{0,4})/, '$1.$2.$3/$4');
                } else if (value.length <= 14) {
                    formattedValue = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{0,2})/, '$1.$2.$3/$4-$5');
                }
            }

            input.value = formattedValue;
        }

        function applyPhoneMask(input) {
            let value = input.value.replace(/\D/g, ''); 
            let formattedValue = '';

            if (value.length > 11) {
                value = value.slice(0, 11);
            }

            if (value.length > 0) {
                if (value.length <= 2) {
                    formattedValue = value.replace(/^(\d{0,2})/, '($1');
                } else if (value.length <= 6) {
                    formattedValue = value.replace(/^(\d{2})(\d{0,4})/, '($1) $2');
                } else if (value.length <= 10) {
                    formattedValue = value.replace(/^(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
                } else if (value.length <= 11) {
                    formattedValue = value.replace(/^(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
                }
            }

            input.value = formattedValue;
        }

        function toggleTimeInputs(day) {
        var allTimeInputs = document.querySelectorAll('.time-inputs');
        var checkBox = document.getElementById('checkbox-' + day);
        var timeInputs = document.getElementById('time-inputs-' + day);
        
        allTimeInputs.forEach(function(input) {
            input.classList.add('hidden');
        });
        
        if (checkBox.checked) {
            timeInputs.classList.remove('hidden');
        }
    }

        function applyCpfMask(input) {
            let value = input.value.replace(/\D/g, '');
            let formattedValue = '';

            if (value.length > 11) {
                value = value.slice(0, 11);
            }

            if (value.length > 0) {
                if (value.length <= 3) {
                    formattedValue = value.replace(/^(\d{0,3})/, '$1');
                } else if (value.length <= 6) {
                    formattedValue = value.replace(/^(\d{3})(\d{0,3})/, '$1.$2');
                } else if (value.length <= 9) {
                    formattedValue = value.replace(/^(\d{3})(\d{3})(\d{0,3})/, '$1.$2.$3');
                } else if (value.length <= 11) {
                    formattedValue = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{0,2})/, '$1.$2.$3-$4');
                }
            }

            input.value = formattedValue;
        }

        function applyCepMask(input) {
            let value = input.value.replace(/\D/g, ''); 
            let formattedValue = '';

            if (value.length > 8) {
                value = value.slice(0, 8);
            }

            if (value.length > 0) {
                if (value.length <= 5) {
                    formattedValue = value.replace(/^(\d{0,5})/, '$1');
                } else if (value.length <= 8) {
                    formattedValue = value.replace(/^(\d{5})(\d{0,3})/, '$1-$2');
                }
            }

            input.value = formattedValue;
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('cnpj').addEventListener('input', function() {
                applyCnpjMask(this);
            });

            document.getElementById('phone').addEventListener('input', function() {
                applyPhoneMask(this);
            });

            document.getElementById('ownerTelephone').addEventListener('input', function() {
                applyPhoneMask(this);
            });

            document.getElementById('cep').addEventListener('input', function() {
                applyCepMask(this);
            });

            document.getElementById('ownerCpf').addEventListener('input', function() {
                applyCpfMask(this);
            });
        });
    </script>

</x-guest-layout>
