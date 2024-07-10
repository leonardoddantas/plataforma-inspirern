<x-app-layout>
    <x-slot name="slot">
        <div class="w-full flex justify-center items-center">
            <div class="w-4/5 flex flex-col">
                <div class="w-full flex justify-end mt-10">
                    <select name="status" id="status" class="mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="">Status</option>
                        <option value="pendente">Pendente</option>
                        <option value="resolvido">Resolvido</option>
                    </select>
                    <input type="date" id="date" name="date" class="block border-gray-300 text-lg focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mr-2">
                    <input type="text" id="search" name="search" class="block border-gray-300 text-lg focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mr-2" placeholder="Pesquisar">
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
