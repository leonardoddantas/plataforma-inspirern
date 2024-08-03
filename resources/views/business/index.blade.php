<x-app-layout>
    <x-slot name="slot">
        <div class="w-full flex justify-center items-center">
            <div class="w-4/5 flex flex-col">

                 @auth
                    @if(auth()->user()->type === 'admin')
                        <div class="w-full flex justify-end mt-10">
                            <select name="status" id="status" class="mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Status</option>
                                <option value="pendente">Pendente</option>
                                <option value="aprovado">Aprovado</option>
                                <option value="reprovado">Reprovado</option>
                            </select>
                            <input type="date" id="date" name="date" class="block border-gray-300 text-lg focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mr-2">
                            <input type="text" id="search" name="search" class="block border-gray-300 text-lg focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mr-2" placeholder="Pesquisar">
                            <x-primary-button class="w-1/6" id="searchButton">
                                {{ __('Pesquisar') }}
                            </x-primary-button>
                        </div>
                    @endif
                @endauth

                <div class="w-full overflow-x-auto flex justify-center items-center mt-3 mb-20">
                    <table class="w-full bg-white border text-center shadow-md">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200">Nome</th>
                                <th class="py-2 px-4 border-b border-gray-200">CNPJ</th>
                                <th class="py-2 px-4 border-b border-gray-200">Categoria</th>
                                <th class="py-2 px-4 border-b border-gray-200">Data de Cadastro</th>
                                <th class="py-2 px-4 border-b border-gray-200">Status</th>
                                <th class="py-2 px-4 border-b border-gray-200">Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($businesses as $business)
                            <tr class="bg-gray-50">
                                <td class="py-2 px-4 border-b border-gray-200">{{ $business->businessName }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $business->cnpj }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $business->category }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $business->registrationDate->format('d/m/Y') }}</td>
                               <td class="py-2 px-4 border-b border-gray-200">
                                    @php
                                        $statusClass = '';
                                        switch ($business->status) {
                                            case 'pendente':
                                                $statusClass = 'text-yellow-600';
                                                break;
                                            case 'aprovado':
                                                $statusClass = 'text-green-600';
                                                break;
                                            case 'reprovado':
                                                $statusClass = 'text-red-600';
                                                break;
                                            default:
                                                $statusClass = 'bg-gray-200 text-gray-800';
                                                break;
                                        }
                                    @endphp

                                    <span class="px-2 py-1 rounded {{ $statusClass }}">{{ $business->status }}</span>
                                </td>

                                <td class="py-2 px-4 border-b border-gray-200">

                                     @auth
                                        @if(auth()->user()->type === 'admin')
                                            <a href="{{ route('business.show', $business->id) }}" class="text-blue-500 hover:text-blue-700">Detalhes</a>
                                        @endif
                                        
                                        @if(auth()->user()->type !== 'admin')
                                            <a href="{{ route('business.edit', $business->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                                        @endif
                                    @endauth
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-2 px-4 border-b border-gray-200">Nenhum negócio encontrado.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
           document.querySelector('#searchButton').addEventListener('click', () => {
                const searchValue = document.querySelector('#search').value.trim();
                const statusValue = document.querySelector('#status').value.trim();
                const dateValue = document.querySelector('#date').value.trim();
                let query = 'business?';

                if (searchValue !== '') {
                    query += `search=${encodeURIComponent(searchValue)}&`;
                }

                if (statusValue !== '') {
                    query += `status=${encodeURIComponent(statusValue)}&`;
                }

                if (dateValue !== '') {
                    query += `date=${encodeURIComponent(dateValue)}`;
                }

                window.location.href = query;
            });
        </script>
    </x-slot>
</x-app-layout>
