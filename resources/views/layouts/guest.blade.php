<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'INSPIRERN') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="flex">

        <div class="w-2/5 min-h-screen p-24 flex flex-col sm:justify-center items-center bg-gray-400 text-center">
            <h1 class="text-5xl font-semibold tracking-widest">Logo</h1>
            <h1 class="mt-16 text-4xl font-semibold tracking-wider">Bem-vindo <br>de volta</h1>
            <p class="mt-3">Acesse sua conta e vamos explorar o RN</p>
            <a href="/" class="mt-16 w-full px-2 py-3 bg-slate-700 font-semibold border border-transparent rounded-md text-xs text-white uppercase tracking-widest">Entar</a>
        </div>

        <div class="min-h-screen w-3/5 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">

            <div class="text-center">
                <h1 class="text-4xl font-semibold tracking-wider">Crie sua Conta</h1>
                <p class="text-lg">Preencha os dados abaixo</p>
            </div>

            <div class="w-full sm:max-w-md mt-6">
                {{ $slot }}
            </div>

        </div>
    </div>
</body>

</html>