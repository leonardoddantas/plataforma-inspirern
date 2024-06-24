<!-- resources/views/business/show.blade.php -->
<x-app-layout>
    <x-slot name="slot">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">{{ $business->businessName }}</h2>
                <p><strong>Categoria:</strong> {{ $business->category }}</p>
                <p><strong>Descrição:</strong> {{ $business->description }}</p>
                <p><strong>Telefone:</strong> {{ $business->phone }}</p>
                <p><strong>Email:</strong> {{ $business->email }}</p>
                <p><strong>Website:</strong> {{ $business->websiteURL ?: 'Não especificado' }}</p>
                <p><strong>Redes Sociais:</strong> {{$business->socialMedia ?: 'Não especificado'}}</p>
                <p><strong>Endereço:</strong> {{ $business->road }}, {{ $business->number }} - {{ $business->neighborhood }}, {{ $business->city }} - {{ $business->state }}, CEP: {{ $business->cep }}</p>
                <p><strong>Dias de funcionamento:</strong>{{$business->operatingDays}}</p>
                <p><strong>Horário de funcionamento:</strong>{{$business->operatingHours}}</p>
                <p><strong>Foto do Local:</strong> <img src="{{ asset('storage/' . $business->locationPhoto) }}" alt="Foto do Local" class="w-1/2"></p>
                <p><strong>Proprietário:</strong> {{ $business->ownerName }}</p>
                <p><strong>Telefone do Proprietário:</strong> {{ $business->ownerTelephone }}</p>
                <p><strong>Email do Proprietário:</strong> {{ $business->ownerEmail }}</p>
                <p><strong>CPF do Proprietário:</strong> {{ $business->ownerCpf }}</p>
                <p><strong>Status:</strong> {{ $business->status }}</p>
                <a href="{{ route('business.index') }}" class="text-blue-500 hover:text-blue-700">Voltar para a lista de negócios</a>
            </div>
        </div>
    </x-slot>
</x-app-layout>
