@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
<div class="max-w-2xl mx-auto py-8 animate-slideDown">
    <!-- Header -->
    <div class="mb-8">
        <a href="{{ route('profile.settings') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold mb-4">
            ← Voltar para Configurações
        </a>
        <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
            ✏️ Editar Perfil
        </h1>
        <p class="text-gray-600">Atualize suas informações pessoais</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white/80 backdrop-filter backdrop-blur rounded-2xl shadow-xl p-8 border border-blue-100">
        <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-3">👤 Nome Completo</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', Auth::user()->name) }}"
                    required
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('name') border-red-500 @enderror"
                    placeholder="Seu nome completo"
                >
                @error('name')
                    <span class="text-red-600 text-sm mt-2 font-semibold block">⚠️ {{ $message }}</span>
                @enderror
            </div>

            <!-- Divider -->
            <div class="border-t-2 border-gray-200 pt-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">🔐 Alterar Senha (Opcional)</h3>
                <p class="text-gray-600 text-sm mb-4">Deixe em branco se não deseja alterar sua senha</p>
            </div>

            <!-- Nova Senha -->
            <div>
                <label for="password" class="block text-sm font-bold text-gray-700 mb-3">🔐 Nova Senha</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('password') border-red-500 @enderror"
                    placeholder="Deixe em branco para manter a senha atual"
                >
                @error('password')
                    <span class="text-red-600 text-sm mt-2 font-semibold block">⚠️ {{ $message }}</span>
                @enderror
            </div>

            <!-- Confirmar Nova Senha -->
            <div>
                <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-3">🔐 Confirmar Nova Senha</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('password_confirmation') border-red-500 @enderror"
                    placeholder="Confirme sua nova senha"
                >
                @error('password_confirmation')
                    <span class="text-red-600 text-sm mt-2 font-semibold block">⚠️ {{ $message }}</span>
                @enderror
            </div>

            <!-- Divider -->
            <div class="border-t-2 border-gray-200 pt-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">✔️ Verificação de Segurança</h3>
            </div>

            <!-- Senha Atual (Obrigatória para confirmar qualquer mudança) -->
            <div>
                <label for="current_password" class="block text-sm font-bold text-gray-700 mb-3">🔑 Senha Atual</label>
                <input
                    type="password"
                    id="current_password"
                    name="current_password"
                    required
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('current_password') border-red-500 @enderror"
                    placeholder="Digite sua senha atual para confirmar"
                >
                @error('current_password')
                    <span class="text-red-600 text-sm mt-2 font-semibold block">⚠️ {{ $message }}</span>
                @enderror
            </div>

            <!-- Info Card -->
            <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
                <p class="text-blue-700 text-sm">
                    <span class="font-bold">💡 Lembrete:</span> Você precisa digitar sua senha atual para fazer qualquer alteração em sua conta.
                </p>
            </div>

            <!-- Botões -->
            <div class="flex gap-4 pt-6">
                <a href="{{ route('profile.settings') }}" class="flex-1 bg-gray-300 text-gray-800 font-bold py-3 rounded-xl hover:shadow-lg transition duration-200 text-center hover:scale-105 transform">
                    ❌ Cancelar
                </a>
                <button
                    type="submit"
                    class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold py-3 rounded-xl hover:shadow-lg transition duration-200 hover:scale-105 transform"
                >
                    ✅ Salvar Alterações
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
