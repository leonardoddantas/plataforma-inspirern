<x-app-layout>
    <x-slot name="slot">
        <div class="w-full flex justify-center items-center">
        <div class="w-4/5 flex flex-col">
            <div class="w-full flex justify-end mt-10">
                <input type="text" id="search" name="search" class="block 1/3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mr-2" placeholder="Pesquisar">
                <x-primary-button class="w-1/6" id="searchButton">
                    {{ __('Pesquisar') }}
                </x-primary-button>
            </div>
            <div class="w-full overflow-x-auto flex justify-center items-center mt-3">
                <table class="w-full bg-white border text-center shadow-md">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-200">Nome</th>
                            <th class="py-2 px-4 border-b border-gray-200">Categoria</th>
                            <th class="py-2 px-4 border-b border-gray-200">Data</th>
                            <th class="py-2 px-4 border-b border-gray-200">Status</th>
                            <th class="py-2 px-4 border-b border-gray-200">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($businesses as $business)
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4 border-b border-gray-200">{{ $business->businessName }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $business->category }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $business->registrationDate->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $business->status }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <a href="{{ route('business.show', $business->id) }}" class="text-blue-500 hover:text-blue-700">Detalhes</a>
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
        var search = document.querySelector('#search');

        var searchButton = document.querySelector('#searchButton');
        searchButton.addEventListener('click', () => {
            window.location = 'business?search=' + search.value;
        });

    </script>
    </x-slot>
</x-app-layout>
