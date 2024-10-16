<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Negócios</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .header {
            text-align: center; margin-bottom: 20px; padding: 10px; border-bottom: 2px solid #333;
        }
        .header h1 {
            margin: 0; font-size: 24px; color: #333;
        }
        .header p {
            font-size: 12px; color: #555; margin: 5px 0 0;
        }
        table { 
            width: 100%; border-collapse: collapse; margin-top: 20px;
            font-size: 12px;
        }
        table, th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; text-align: left; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .status-approved { color: white; background-color: #4CAF50; padding: 4px 8px; border-radius: 4px; font-size: 10px; }
        .status-pending { color: white; background-color: #FF9800; padding: 4px 8px; border-radius: 4px; font-size: 10px; }
        .status-rejected { color: white; background-color: #F44336; padding: 4px 8px; border-radius: 4px; font-size: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Relatório de Negócios Cadastrados</h1>
        <p>Data de Emissão: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        <p>Total de Negócios: {{ count($businesses) }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($businesses as $business)
                <tr>
                    <td>{{ $business->businessName }}</td>
                    <td>{{ $business->category }}</td>
                    <td>{{ $business->phone }}</td>
                    <td>{{ $business->email }}</td>
                    <td>{{ $business->road }}, {{ $business->number }}, {{ $business->neighborhood }}, {{ $business->city }} - {{ $business->state }}</td>
                    <td>
                        <span class="
                            @if($business->status === 'aprovado') status-approved 
                            @elseif($business->status === 'pendente') status-pending 
                            @else status-rejected @endif">
                            {{ ucfirst($business->status) }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
