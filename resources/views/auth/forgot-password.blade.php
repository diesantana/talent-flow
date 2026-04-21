@extends('layouts.guest')

@section('title', 'Recuperar Senha')

@section('content')
    <div class="bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center">Esqueceu sua senha?</h2>
        <p class="text-sm text-gray-600 mb-6 text-center">
            Informe seu e-mail e enviaremos um link para redefinir sua senha.
        </p>

        @if (session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" novalidate>
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                {{-- exibe apenas required e email para evitar user enumeration --}}
                @error('email')
                    @php
                        $permitidos = [
                            __('validation.required', ['attribute' => __('validation.attributes.email')]),
                            __('validation.email', ['attribute' => __('validation.attributes.email')]),
                        ];
                    @endphp
                    @if (in_array($message, $permitidos))
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @endif
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition font-medium">
                Enviar link de recuperação
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:text-indigo-800">
                Voltar para o login
            </a>
        </div>
    </div>
@endsection
