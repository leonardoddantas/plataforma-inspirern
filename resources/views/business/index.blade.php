<x-app-layout>
    <x-slot name="slot">
        <div class="overflow-x-auto flex justify-center items-center mt-10">
            <table class="w-4/5 bg-white border text-center shadow-md">
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
                    @foreach($businesses as $business)
                    <tr class="bg-gray-50">
                        <td class="py-2 px-4 border-b border-gray-200">{{ $business->businessName }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $business->category }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $business->registrationDate->format('d/m/Y') }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $business->status }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            <a href="{{ route('business.show', $business->id) }}" class="text-blue-500 hover:text-blue-700">Detalhes</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>
