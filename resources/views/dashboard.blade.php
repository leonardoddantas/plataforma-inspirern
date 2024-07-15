<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex gap-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-44 h-32 bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer" onclick="redirectToStatus('')">
                <div class="p-3 text-gray-900 text-center">
                    <h4 class="text-xs">Negócios Cadastrados</h4>
                    <p class="text-5xl font-semibold mt-4">{{ $businessesStatus['all']}}</p>
                </div>
            </div>

            <div class="w-44 h-32 bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer" onclick="redirectToStatus('aprovado')">
                <div class="p-3 text-gray-900 text-center">
                    <h4 class="text-xs">Negócios Aprovados</h4>
                    <p class="text-5xl font-semibold text-green-400 mt-4">{{ $businessesStatus['aprovado']}}</p>
                </div>
            </div>

            <div class="w-44 h-32 bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer" onclick="redirectToStatus('reprovado')">
                <div class="p-3 text-gray-900 text-center">
                    <h4 class="text-xs">Negócios Reprovados</h4>
                    <p class="text-5xl font-semibold text-red-400 mt-4">{{ $businessesStatus['reprovado']}}</p>
                </div>
            </div>

            <div class="w-44 h-32 bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer" onclick="redirectToStatus('pendente')">
                <div class="p-3 text-gray-900 text-center">
                    <h4 class="text-xs">Negócios Pendentes</h4>
                    <p class="text-5xl font-semibold text-yellow-400 mt-4">{{ $businessesStatus['pendente']}}</p>
                </div>
            </div>

            <div class="p-3 flex-grow h-32 bg-white overflow-hidden shadow-sm sm:rounded-lg flex items-center justify-center">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Reprovado', 'Aprovado', 'Pendente'],
                    datasets: [{
                        label: 'Status dos Negócios',
                        data: [
                            {{ $businessesStatus['reprovado'] }},
                            {{ $businessesStatus['aprovado'] }},
                            {{ $businessesStatus['pendente'] }}
                        ],
                        backgroundColor: [
                            '#fca5a5',
                            '#86efac',
                            '#fef08a',
                        ],
                        borderColor: [
                            '#ef4444',
                            '#22c55e',
                            '#facc15',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                         legend: {
                            position: 'right',
                        },
                        tooltip: {
                            enabled: false,
                        }
                    }
                }
            });
        });

        function redirectToStatus(status)
        {
             window.location.href = '/business?status=' + status;
        }
    </script>
</x-app-layout>
