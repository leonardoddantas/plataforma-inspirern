<!-- resources/views/business/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business') }}
        </h2>
    </x-slot>

    <form method="post" action="{{ route('business.update', $business->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="py-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="my-6 space-y-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Informações básicas') }}
                        </h2>
                    </div>

                    <div>
                        <x-input-label for="businessName" :value="__('Nome do Negócio')" />
                        <x-text-input id="businessName" name="businessName" type="text" class="mt-1 block w-full" value="{{ $business->businessName }}"/>
                        <x-input-error class="mt-2" :messages="$errors->get('businessName')" />
                    </div>

                    <div class="flex justify-between w-full">
                        <div class="w-full mr-5">
                            <x-input-label for="category" :value="__('Categoria')" />
                            <x-text-input id="category" name="category" type="text" class="mt-1 block w-full" value="{{ $business->category }}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('category')" />
                        </div>

                        <div class="w-full">
                            <x-input-label for="cnpj" :value="__('CNPJ')" />
                            <x-text-input id="cnpj" name="cnpj" type="text" class="mt-1 block w-full" value="{{ $business->cnpj }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('cnpj')" />
                        </div>
                    </div>
                    
                    <div>
                        <x-input-label for="description" :value="__('Descrição')" />
                        <textarea id="description" name="description" rows="5" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $business->description }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Informações de contato') }}
                        </h2>
                    </div>

                <div class="flex justify-between w-full">
                        <div class="w-full mr-5">
                            <x-input-label for="phone" :value="__('Telefone')" />
                            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" value="{{ $business->phone }}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>

                        <div class="w-full">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" typemaile="text" class="mt-1 block w-full" value="{{ $business->email }}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                </div>

                    <div>
                        <x-input-label for="url" :value="__('Redes Sociais')" />
                    </div>
                    
                    <div class="flex flex-wrap justify-between">

                        <div class="w-1/2 p-2">
                            <x-input-label for="websiteURL" :value="__('URL do site')" />
                            <x-text-input id="websiteURL" name="websiteURL" type="text" class="mt-1 block w-full" value="{{ $business->websiteURL }}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('websiteURL')" />
                        </div>

                        @foreach ($business->socialMedias as $socialMedia)

                            @php
                                $socialMediaName = $socialMedia->socialMediaName;
                                $socialMediaURL = $socialMedia->socialMediaURL;
                                $fieldId = Str::slug($socialMediaName);
                            @endphp

                            @if ($socialMediaName == 'Facebook')
                                <div class="w-1/2 p-2">
                                    <x-input-label for="facebook" :value="__('Facebook')" />
                                    <x-text-input id="facebook" name="facebook" type="text" class="mt-1 block w-full" value="{{ $socialMediaURL }}"/>
                                    <x-input-error class="mt-2" :messages="$errors->get('facebook')" />
                                </div>
                            @elseif ($socialMediaName == 'Instagram')
                                <div class="w-1/2 p-2">
                                    <x-input-label for="instagram" :value="__('Instagram')" />
                                    <x-text-input id="instagram" name="instagram" type="text" class="mt-1 block w-full" value="{{ $socialMediaURL }}"/>
                                    <x-input-error class="mt-2" :messages="$errors->get('instagram')" />
                                </div>
                            @elseif ($socialMediaName == 'WhatsApp')
                                <div class="w-1/2 p-2">
                                    <x-input-label for="whatsApp" :value="__('WhatsApp')" />
                                    <x-text-input id="whatsApp" name="whatsApp" type="text" class="mt-1 block w-full" value="{{ $socialMediaURL }}"/>
                                    <x-input-error class="mt-2" :messages="$errors->get('whatsApp')" />
                                </div>
                            @else
                                <div class="w-1/2 p-2">
                                    <x-input-label for="{{ $fieldId }}" :value="__($socialMediaName)" />
                                    <x-text-input id="{{ $fieldId }}" name="{{ $fieldId }}" type="text" class="mt-1 block w-full" value="{{ $socialMediaURL }}"/>
                                    <x-input-error class="mt-2" :messages="$errors->get($fieldId)" />
                                </div>
                            @endif

                    @endforeach

                    </div>

                    <div id="divAddSocialMedia" class="flex-wrap hidden">
                       
                    </div>

                    <div class="flex justify-start p-2">
                        <x-primary-button id="buttonAddSocialMidia" type="button">Adicionar rede social</x-primary-button>
                    </div>

                    <button type="button" onclick="gatherNewSocialMedias()">toque</button>
        
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Localização') }}
                        </h2>
                    </div>

                    <div>
                        <x-input-label for="road" :value="__('Rua')" />
                        <x-text-input id="road" name="road" type="text" class="mt-1 block w-full" value="{{ $business->road }}"/>
                        <x-input-error class="mt-2" :messages="$errors->get('road')" />
                    </div>

                    <div class="flex justify-between w-full">
                        <div class="w-full mr-5">
                            <x-input-label for="number" :value="__('Número')" />
                            <x-text-input id="number" name="number" typemaile="text" class="mt-1 block w-full" value="{{ $business->number }}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('number')" />
                        </div>

                        <div class="w-full">
                            <x-input-label for="neighborhood" :value="__('Bairro')" />
                            <x-text-input id="neighborhood" name="neighborhood" type="text" class="mt-1 block w-full" value="{{ $business->neighborhood }}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('neighborhood')" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="city" :value="__('Cidade')" />
                        <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" value="{{ $business->city }}"/>
                        <x-input-error class="mt-2" :messages="$errors->get('city')" />
                    </div>
                    
                    <div class="flex justify-between w-full">
                        <div class="w-full mr-5">
                            <x-input-label for="state" :value="__('Estado')" />
                            <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" value="{{ $business->state }}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('state')" />
                        </div>

                        <div class="w-full">
                            <x-input-label for="cep" :value="__('CEP')" />
                            <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" value="{{ $business->cep }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('cep')" />
                        </div>
                    </div>

                    <div>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Detalhes Adicionais') }}
                        </h2>
                    </div>
                        
                    <div>
                        <x-input-label for="diasF" :value="__('Dias de Funcionamento')" />
                        @php
                            $operatingSchedule = json_decode($business->operatingSchedule, true);
                        @endphp

                        <ul class="mt-2 flex flex-row justify-between">
                            @foreach($operatingSchedule as $schedule)
                                <li class="flex flex-col justify-center items-center">
                                    <span>{{ ucfirst($schedule['day']) }}</span>
                                    <x-text-input name="operatingSchedule[{{ strtolower($schedule['day']) }}][opening_time]" type="time" class="mt-1 block w-full" value="{{ $schedule['opening_time'] }}" />
                                    <x-text-input name="operatingSchedule[{{ strtolower($schedule['day']) }}][closing_time]" type="time" class="mt-1 block w-full" value="{{ $schedule['closing_time'] }}" />
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <x-input-label for="locationPhoto" :value="__('Foto do Local')" />
                        <img src="{{ asset('storage/' . $business->locationPhoto) }}" alt="Foto do Local" class="w-1/2 h-1/2 mb-4">
                        <label for="locationPhoto" class="cursor-pointer bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 mt-5">
                            Atualizar Foto
                        </label>
                        <input id="locationPhoto" name="locationPhoto" type="file" class="hidden" />
                    </div>

                    <div>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Informações do Proprietário') }}
                        </h2>
                    </div>

                    <div class="flex justify-between w-full">
                        <div class="w-full mr-5">
                            <x-input-label for="ownerName" :value="__('Nome do Proprietário')" />
                            <x-text-input id="ownerName" name="ownerName" type="text" class="mt-1 block w-full" value="{{ $business->ownerName }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('ownerName')" />
                        </div>

                        <div class="w-full">
                            <x-input-label for="ownerCpf" :value="__('CPF do Proprietário')" />
                            <x-text-input id="ownerCpf" name="ownerCpf" type="text" class="mt-1 block w-full" value="{{ $business->ownerCpf }}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('ownerCpf')" />
                        </div>
                    </div>

                    <div class="flex justify-between w-full">
                        <div class="w-full mr-5">
                            <x-input-label for="ownerTelephone" :value="__('Telefone do Proprietário')" />
                            <x-text-input id="ownerTelephone" name="ownerTelephone" type="text" class="mt-1 block w-full" value="{{ $business->ownerTelephone }}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('ownerTelephone')" />
                        </div>

                        <div class="w-full">
                            <x-input-label for="ownerEmail" :value="__('Email do Proprietário')" />
                            <x-text-input id="ownerEmail" name="ownerEmail" type="text" class="mt-1 block w-full" value="{{ $business->ownerEmail }}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('ownerEmail')" />
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button type="subimit">Salvar</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        let buttonAddSocialMidia = document.querySelector('#buttonAddSocialMidia');
        let divAddSocialMedia = document.querySelector('#divAddSocialMedia');
        let socialMediaIndex = 0;

        buttonAddSocialMidia.addEventListener('click', () => {
            divAddSocialMedia.classList.replace('hidden', 'flex');

            const newCamp = `
                <div class="w-1/2 p-2">
                    <x-input-label for="socialMediaName_${socialMediaIndex}" :value="__('Nome da rede social')" />
                    <x-text-input id="socialMediaName_${socialMediaIndex}" name="socialMediaNames[]" type="text" class="mt-1 block w-full"/>
                    <x-input-error class="mt-2" :messages="$errors->get('socialMediaNames[]')" />
                </div>
                <div class="w-1/2 p-2">
                    <x-input-label for="socialMediaURL_${socialMediaIndex}" :value="__('Link da rede social')" />
                    <x-text-input id="socialMediaURL_${socialMediaIndex}" name="socialMediaURLs[]" type="text" class="mt-1 block w-full"/>
                    <x-input-error class="mt-2" :messages="$errors->get('socialMediaURLs[]')" />
                </div>
            `;

            divAddSocialMedia.insertAdjacentHTML('beforeend', newCamp);
            socialMediaIndex++;
        });

    </script>

</x-app-layout>