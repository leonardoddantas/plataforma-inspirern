<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cadastro Concluído</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

   <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="h-screen flex justify-center items-center">
        <div class="w-1/2 p-10 border border-transparent rounded-xl bg-gray-400 text-center text-gray-900">
            <h1 class="text-2xl font-semibold tracking-wider mb-6">Obrigado pelo seu Cadastro!</h1>
            <p class="mb-4 text-lg">
                Seu cadastro foi recebido com sucesso e está em análise. Agradecemos por contribuir para o desenvolvimento do turismo no Rio Grande do Norte! Nossa equipe está revisando as informações fornecidas e em breve você receberá uma notificação sobre a aprovação do seu cadastro. Esse processo pode levar até 5 dias úteis. Você pode acompanhar o status do seu cadastro na seção 'Meus Cadastros' no seu painel de controle. Se tiver qualquer dúvida, entre em contato com nossa equipe de suporte através do e-mail suporte@inspirern.com ou pelo telefone (84) 1234-5678
            </p>
            <a href="{{ route('dashboard') }}" class="text-blue-700 hover:underline">Voltar para Dashboard</a>
        </div>
    </div>
</body>
</html>