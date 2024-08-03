<!-- resources/views/business/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business') }}
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="mt-6 space-y-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Informações básicas') }}
                    </h2>
                </div>

                <div>
                    <x-input-label for="nome_negocio" :value="__('Nome do Negócio')" />
                    <x-text-input id="nome_negocio" name="nome_negocio" type="text" class="mt-1 block w-full" value="{{ $business->businessName }}"  disabled/>
                </div>

                <div class="flex justify-between w-full">
                    <div class="w-full mr-5">
                        <x-input-label for="categoria" :value="__('Categoria')" />
                        <x-text-input id="categoria" name="categoria" type="text" class="mt-1 block w-full" value="{{ $business->category }}"  disabled/>
                    </div>

                    <div class="w-full">
                        <x-input-label for="cnpj" :value="__('CNPJ')" />
                        <x-text-input id="cnpj" name="cnpj" type="text" class="mt-1 block w-full" value="{{ $business->cnpj }}"  disabled/>
                    </div>
                </div>
                
                <div>
                    <x-input-label for="descricao" :value="__('Descrição')" />
                      <textarea id="descricao" name="descricao" rows="5" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" disabled>{{ $business->description }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="mt-6 space-y-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Informações de contato') }}
                    </h2>
                </div>

               <div class="flex justify-between w-full">
                    <div class="w-full mr-5">
                        <x-input-label for="telefone" :value="__('Telefone')" />
                        <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full" value="{{ $business->phone }}"  disabled/>
                    </div>

                    <div class="w-full">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" typemaile="text" class="mt-1 block w-full" value="{{ $business->email }}"  disabled/>
                    </div>
               </div>

                <div>
                    <x-input-label for="url" :value="__('Redes Sociais')" />
                </div>

                <div class="flex flex-row gap-5">
                    <a href="{{ $business->websiteURL }}" target="_blank">
                         <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M128 32C92.7 32 64 60.7 64 96l0 256 64 0 0-256 384 0 0 256 64 0 0-256c0-35.3-28.7-64-64-64L128 32zM19.2 384C8.6 384 0 392.6 0 403.2C0 445.6 34.4 480 76.8 480l486.4 0c42.4 0 76.8-34.4 76.8-76.8c0-10.6-8.6-19.2-19.2-19.2L19.2 384z"/></svg>
                    </a> 
                    
                    @foreach ($business->socialMedias as $socialMedia)
                        <a href="{{ $socialMedia->socialMediaURL }}" target="_blank">

                            @if ($socialMedia->socialMediaName == 'Facebook')
                                
                                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>

                            @elseif ($socialMedia->socialMediaName == 'Instagram')

                                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>

                            @elseif ($socialMedia->socialMediaName == 'WhatsApp')

                                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>

                            @endif
                        </a>
                    @endforeach
                </div>  
            </div>  
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="mt-6 space-y-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Localização') }}
                    </h2>
                </div>

                <div>
                    <x-input-label for="rua" :value="__('Rua')" />
                    <x-text-input id="rua" name="rua" type="text" class="mt-1 block w-full" value="{{ $business->road }}"  disabled/>
                </div>

                <div class="flex justify-between w-full">
                    <div class="w-full mr-5">
                        <x-input-label for="numero" :value="__('Número')" />
                        <x-text-input id="numero" name="numero" typemaile="text" class="mt-1 block w-full" value="{{ $business->number }}"  disabled/>
                    </div>

                     <div class="w-full">
                        <x-input-label for="vizinha" :value="__('Bairro')" />
                        <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full" value="{{ $business->neighborhood }}"  disabled/>
                    </div>
                </div>

                <div>
                    <x-input-label for="cidade" :value="__('Cidade')" />
                    <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" value="{{ $business->city }}"  disabled/>
                </div>

                
                <div class="flex justify-between w-full">
                    <div class="w-full mr-5">
                        <x-input-label for="estado" :value="__('Estado')" />
                        <x-text-input id="estado" name="estado" type="text" class="mt-1 block w-full" value="{{ $business->state }}"  disabled/>
                    </div>

                    <div class="w-full">
                        <x-input-label for="cep" :value="__('CEP')" />
                        <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" value="{{ $business->cep }}"  disabled/>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="mt-6 space-y-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
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
                                <span>{{ $schedule['opening_time'] }} - {{ $schedule['closing_time'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <x-input-label :value="__('Foto do Local')" />
                    <img src="{{ asset('storage/' . $business->locationPhoto) }}" alt="Foto do Local" class="w-1/2">
                </div>
            </div>
        </div>
    </div>


    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="mt-6 space-y-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Informações do Proprietário') }}
                    </h2>
                </div>

                <div class="flex justify-between w-full">
                    <div class="w-full mr-5">
                        <x-input-label for="proprietario" :value="__('Nome do Proprietário')" />
                        <x-text-input id="proprietario" name="proprietario" type="text" class="mt-1 block w-full" value="{{ $business->ownerName }}"  disabled/>
                    </div>

                    <div class="w-full">
                        <x-input-label for="cpf" :value="__('CPF do Proprietário')" />
                        <x-text-input id="cpf" name="cpf" type="text" class="mt-1 block w-full" value="{{ $business->ownerCpf }}"  disabled/>
                    </div>
                </div>

                <div class="flex justify-between w-full">
                    <div class="w-full mr-5">
                        <x-input-label for="telefoneP" :value="__('Telefone do Proprietário')" />
                        <x-text-input id="telefoneP" name="telefoneP" type="text" class="mt-1 block w-full" value="{{ $business->ownerTelephone }}"  disabled/>
                    </div>

                    <div class="w-full">
                        <x-input-label for="emailP" :value="__('Email do Proprietário')" />
                        <x-text-input id="emailP" name="emailP" type="text" class="mt-1 block w-full" value="{{ $business->ownerEmail }}"  disabled/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form class="mt-6 space-y-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg" method="post" action="{{ route('business.avaliation') }}" id="avaliation-form">
                @csrf
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Status do Negócio') }}
                    </h2>
                </div>

                <x-text-input name="id" type="hidden" value="{{ $business->id }}"/>

                <div>
                    <x-input-label for="status" :value="__('Status Atual')" />
                    <x-text-input id="status" name="status" type="text" class="mt-1 block w-full" value="{{ old('status', $business->status) }}" disabled/>
                </div>

                <div>
                    <x-input-label for="ratingBusiness" :value="__('Detalhar Status')" />
                    <textarea id="ratingBusiness" name="ratingBusiness" rows="5" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Digite uma descrição...">{{ $business->ratingBusiness }}</textarea>
                    <span class="text-red-500 text-sm hidden" id="ratingBusiness-error"></span>
                </div>

                <div class="flex items-center justify-end gap-4 mt-4">
                    <button type="submit" name="status" value="aprovado" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-200">Aprovar</button>
                    <button type="submit" name="status" value="reprovado" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-200" id="reprovar-button">Reprovar</button>
                </div>
            </form>
        </div>
    </div>

   <script>
        document.getElementById('avaliation-form').addEventListener('submit', function(event) {
            var status = event.submitter.value; // Captura o valor do botão clicado
            var ratingBusiness = document.getElementById('ratingBusiness');
            var errorSpan = document.getElementById('ratingBusiness-error');

            // Resetar estado de erro
            errorSpan.classList.add('hidden');
            errorSpan.textContent = '';

            if (status === 'reprovado' && !ratingBusiness.value.trim()) {
                event.preventDefault(); // Impede o envio do formulário
                errorSpan.textContent = 'Por favor, forneça uma descrição para a reprovação.';
                errorSpan.classList.remove('hidden');
                ratingBusiness.focus();
            }
        });
    </script>

</x-app-layout>