<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Banco de Talentos')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900">
    <div class="flex flex-col min-h-screen">
        <!-- Header -->
        <header>
            <div class="text-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-semibold text-gray-800">
                    @yield('header-title', 'Banco de Talentos')
                </h1>
            </div>
        </header>

        <!-- Conteúdo principal -->
        <main class="flex-1 p-8">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
                © Todos os direitos reservados.
            </div>
        </footer>
    </div>
</body>
</html>
