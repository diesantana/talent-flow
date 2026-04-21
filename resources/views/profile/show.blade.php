@extends('layouts.app')

@section('title', 'Meu Perfil')

@section('content')
    <div class="max-w-2xl mx-auto space-y-8">
        {{-- Dados do usuário (apenas leitura) --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Informações da conta</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nome completo</label>
                    <input type="text" value="{{ auth()->user()->name }}" readonly
                        class="w-full px-3 py-2 border border-gray-200 rounded-lg bg-gray-50 text-gray-600 cursor-default focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                    <input type="email" value="{{ auth()->user()->email }}" readonly
                        class="w-full px-3 py-2 border border-gray-200 rounded-lg bg-gray-50 text-gray-600 cursor-default focus:outline-none">
                </div>
            </div>

            <p class="text-xs text-gray-500 mt-3">
                <span class="inline-block bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">
                    {{ auth()->user()->role === 'rh' ? 'RH' : 'Gestor' }}
                </span>
                @if (auth()->user()->area)
                    <span class="ml-2">Área: {{ auth()->user()->area->nome }}</span>
                @endif
            </p>
        </div>

        {{-- Alteração de senha --}}
        <div id="form-password" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 scroll-mt-16">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Alterar senha</h2>

            {{-- Feedback --}}
            @if (session('status') === 'password-updated')
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm">
                    Senha alterada com sucesso!
                </div>
            @endif

            <form method="POST" action="{{ route('user-password.update') }}" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Senha atual</label>
                    <input type="password" name="current_password" id="current_password" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('current_password', 'updatePassword')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Nova senha</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('password', 'updatePassword')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar nova
                        senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <button type="submit"
                    class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition font-medium">
                    Atualizar senha
                </button>
            </form>
        </div>
    </div>
@endsection
{{-- Volta para o scroll do form ao atualizar a senha --}}
@push('scripts')
@endpush

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const isError = {{ $errors->updatePassword->any() ? 'true' : 'false' }};
        const isSuccessful = {{ session('status') ? 'true' : 'false' }};

        if (isError || isSuccessful) {
            document.getElementById('form-password')?.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
</script>
