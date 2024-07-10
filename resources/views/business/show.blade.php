<!-- resources/views/business/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business') }}
        </h2>
    </x-slot>

    <div class="py-12">
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

                <div>
                    <x-input-label for="categoria" :value="__('Categoria')" />
                    <x-text-input id="categoria" name="categoria" type="text" class="mt-1 block w-full" value="{{ $business->category }}"  disabled/>
                </div>

                <div>
                    <x-input-label for="cnpj" :value="__('CNPJ')" />
                    <x-text-input id="cnpj" name="cnpj" type="text" class="mt-1 block w-full" value="{{ $business->cnpj }}"  disabled/>
                </div>
                
                <div>
                    <x-input-label for="descricao" :value="__('Descrição')" />
                    <x-text-input id="descricao" name="descricao" type="text" class="mt-1 block w-full" value="{{ $business->description }}"  disabled/>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="mt-6 space-y-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Informações de contato') }}
                    </h2>
                </div>

                <div>
                    <x-input-label for="telefone" :value="__('Telefone')" />
                    <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full" value="{{ $business->phone }}"  disabled/>
                </div>

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" typemaile="text" class="mt-1 block w-full" value="{{ $business->email }}"  disabled/>
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

    <div class="py-12">
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

                <div>
                    <x-input-label for="numero" :value="__('Número')" />
                    <x-text-input id="numero" name="numero" typemaile="text" class="mt-1 block w-full" value="{{ $business->number }}"  disabled/>
                </div>

                <div>
                    <x-input-label for="vizinha" :value="__('Bairro')" />
                    <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full" value="{{ $business->neighborhood }}"  disabled/>
                </div>

                <div>
                    <x-input-label for="cidade" :value="__('Cidade')" />
                    <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" value="{{ $business->city }}"  disabled/>
                </div>

                <div>
                    <x-input-label for="estado" :value="__('Estado')" />
                    <x-text-input id="estado" name="estado" type="text" class="mt-1 block w-full" value="{{ $business->state }}"  disabled/>
                </div>

                <div>
                    <x-input-label for="cep" :value="__('CEP')" />
                    <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" value="{{ $business->cep }}"  disabled/>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="mt-6 space-y-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Informações do Proprietário') }}
                    </h2>
                </div>

                <div>
                    <x-input-label for="proprietario" :value="__('Nome do Proprietário')" />
                    <x-text-input id="proprietario" name="proprietario" type="text" class="mt-1 block w-full" value="{{ $business->ownerName }}"  disabled/>
                </div>

                <div>
                    <x-input-label for="telefoneP" :value="__('Telefone do Proprietário')" />
                    <x-text-input id="telefoneP" name="telefoneP" type="text" class="mt-1 block w-full" value="{{ $business->ownerTelephone }}"  disabled/>
                </div>

                <div>
                    <x-input-label for="emailP" :value="__('Email do Proprietário')" />
                    <x-text-input id="emailP" name="emailP" type="text" class="mt-1 block w-full" value="{{ $business->ownerEmail }}"  disabled/>
                </div>

                <div>
                    <x-input-label for="cpf" :value="__('CPF do Proprietário')" />
                    <x-text-input id="cpf" name="cpf" type="text" class="mt-1 block w-full" value="{{ $business->ownerCpf }}"  disabled/>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form class="mt-6 space-y-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg" method="post" action="{{ route('business.avaliation') }}">
                @csrf
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Status do Negócio') }}
                    </h2>
                </div>

                <x-text-input name="id" type="hidden" value="{{ $business->id }}"/>

                <div>
                    <x-input-label for="status" :value="__('Status Atual')" />
                    <x-text-input id="status" name="status" type="text" class="mt-1 block w-full" value="{{ old('status', $business->status) }}"/>
                </div>

                <div>
                    <x-input-label for="ratingBusiness" :value="__('Detalhar Status')" />
                    <x-text-input id="ratingBusiness" name="ratingBusiness" type="text" class="mt-1 block w-full"/>
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>