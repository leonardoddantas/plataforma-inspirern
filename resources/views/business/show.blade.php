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
                    <x-input-label for="url" :value="__('URL do site')" />
                    <x-text-input id="url" name="url" type="text" class="mt-1 block w-full" value="{{ $business->websiteURL }}"  disabled/>
                </div>

                <div>
                    <x-input-label for="socialMedia" :value="__('Redes Sociais')" />
                    <x-text-input id="socialMedia" name="socialMedia" type="text" class="mt-1 block w-full" value="{{ $business->socialMedia }}"  disabled/>
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
                    <x-input-label for="diasF" :value="__('Dias de Funionamento')" />
                    <x-text-input id="diasF" name="diasF" type="text" class="mt-1 block w-full" value="{{ $business->operatingDays }}"  disabled/>
                </div>

                <div>
                    <x-input-label for="horasF" :value="__('Horas de Funcionamento')" />
                    <x-text-input id="horasF" name="horasF" type="text" class="mt-1 block w-full" value="{{ $business->operatingHours }}"  disabled/>
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