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
    {{-- NAVBAR --}}
    <header class="bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">

                {{-- LOGO --}}
                <a href="{{ route('candidates.index') }}" class="flex items-center gap-3">
                    <div class="h-9 w-9 rounded-xl bg-indigo-600 flex items-center justify-center shadow-sm">
                        <span class="text-white font-bold text-sm">BT</span>
                    </div>
                    <span class="text-lg font-semibold text-gray-900 tracking-tight">Banco de Talentos</span>
                </a>

                {{-- NAVEGAÇÃO + USER --}}
                <div class="flex items-center gap-6">
                    <nav class="flex items-center gap-5 text-sm font-medium">
                        {{-- 1. DESTACAR VIEW ATUAL --}}
                        <a href="{{ route('candidates.index') }}"
                            class="{{ request()->routeIs('candidates.*') ? 'text-indigo-600' : 'text-gray-700 hover:text-indigo-600' }} transition">
                            Candidatos
                        </a>
                        <a href="{{ route('profile.show') }}"
                            class="{{ request()->routeIs('profile.*') ? 'text-indigo-600' : 'text-gray-700 hover:text-indigo-600' }} transition">
                            Perfil
                        </a>
                    </nav>

                    {{-- 2. DADOS DO USER --}}
                    @auth
                        <div class="hidden sm:flex items-center gap-3 pl-5 border-l border-gray-200">
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-900 leading-tight">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 leading-tight">{{ auth()->user()->email }}</p>
                            </div>
                            <div
                                class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-semibold text-xs">
                                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                            </div>
                        </div>
                    @endauth

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="cursor-pointer bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1.5 px-4 border-red-500 hover:border-transparent rounded-lg text-sm transition">
                            Sair
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    {{-- CONTEÚDO PRINCIPAL --}}
    <main class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-6 py-8">
        <div class="p-6 sm:p-8">
            @yield('content')
        </div>
    </main>

</body>

</html>
