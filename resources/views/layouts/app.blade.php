<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Candidatos') | Banco de Talentos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f5f7fa] antialiased font-sans">

    {{-- NAVBAR --}}
    <header class="bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">

                {{-- LOGO (esquerda) --}}
                <a href="#" class="flex items-center gap-3">
                    <div class="h-9 w-9 rounded-xl bg-indigo-600 flex items-center justify-center shadow-sm">
                        <span class="text-white font-bold text-sm">BT</span>
                    </div>
                    <span class="text-lg font-semibold text-gray-900 tracking-tight">Banco de Talentos</span>
                </a>

                {{-- LINKS DE NAVEGAÇÃO (direita) --}}
                <nav class="flex items-center gap-4 text-sm font-medium">
                    <a href="#" class="text-gray-900 hover:text-indigo-900 transition">Candidatos</a>
                    <a href="#" class="text-gray-900 hover:text-indigo-900 transition">Perfil</a>
                    <button
                        class="cursor-pointer bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1 px-4 border border-red-500 hover:border-transparent rounded-lg">
                        Sair
                    </button>
                </nav>
            </div>
        </div>
    </header>

    {{-- CONTEÚDO PRINCIPAL --}}
    <main class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-6 py-8">
        {{-- BOAS-VINDAS --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Bem-vindo de volta, João</h1>
            <p class="mt-1 text-gray-500">Aqui está uma visão geral dos candidatos da sua área.</p>
        </div>

        {{-- CARD PRINCIPAL --}}
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-6 sm:p-8">
                @yield('content')
            </div>
        </div>
    </main>

</body>

</html>
