@extends('layouts.app')

@section('title', 'Deletar Perfil')

@section('content')
<div class="max-w-2xl mx-auto py-8 animate-slideDown">
    <!-- Header -->
    <div class="mb-8">
        <a href="{{ route('links.index') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold mb-4">
            ← Voltar
        </a>
        <h1 class="text-4xl font-bold bg-gradient-to-r from-red-600 to-pink-600 bg-clip-text text-transparent mb-2">
            ⚠️ Deletar Perfil
        </h1>
        <p class="text-gray-600">Esta ação é permanente e irreversível</p>
    </div>

    <!-- Warning Card -->
    <div class="bg-gradient-to-r from-red-50 to-pink-50 rounded-2xl p-8 border-2 border-red-300 mb-8 shadow-md">
        <div class="flex items-start gap-4">
            <span class="text-4xl">⚠️</span>
            <div>
                <h3 class="text-lg font-bold text-red-700 mb-2">Cuidado! Operação Irreversível</h3>
                <ul class="text-gray-700 space-y-1 text-sm">
                    <li>✗ Sua conta será deletada permanentemente</li>
                    <li>✗ Todos os seus links serão removidos</li>
                    <li>✗ Não será possível recuperar seus dados</li>
                    <li>✗ Sua página pública deixará de existir</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Confirmation Form -->
    <div class="bg-white/80 backdrop-filter backdrop-blur rounded-2xl shadow-xl p-8 border border-red-100">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Para confirmar a exclusão, preencha os dados abaixo:</h2>

        <form action="{{ route('profile.destroy') }}" method="POST" class="space-y-6">
            @csrf
            @method('DELETE')

            <!-- Email do usuário -->
            <div>
                <label for="email" class="block text-sm font-bold text-gray-700 mb-3">📧 Email (para confirmar identidade)</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Digite seu email"
                    required
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 @error('email') border-red-500 @enderror"
                >
                @error('email')
                    <span class="text-red-600 text-sm mt-2 font-semibold block">⚠️ {{ $message }}</span>
                @enderror
            </div>

            <!-- Senha -->
            <div>
                <label for="password" class="block text-sm font-bold text-gray-700 mb-3">🔐 Senha</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Digite sua senha"
                    required
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 @error('password') border-red-500 @enderror"
                >
                @error('password')
                    <span class="text-red-600 text-sm mt-2 font-semibold block">⚠️ {{ $message }}</span>
                @enderror
            </div>

            <!-- Confirmação de compreensão -->
            <div class="bg-gray-100 rounded-xl p-4">
                <label class="flex items-start gap-3 cursor-pointer">
                    <input 
                        type="checkbox" 
                        id="confirm_delete"
                        name="confirm_delete" 
                        required
                        class="mt-1 w-5 h-5 text-red-600 cursor-pointer"
                    >
                    <span class="text-gray-700 text-sm">
                        <span class="font-bold">Eu entendo</span> que esta ação deletará minha conta e todos os meus dados <span class="font-bold">permanentemente</span> e não poderá ser desfeita.
                    </span>
                </label>
            </div>

            <!-- Botões -->
            <div class="flex gap-4 pt-6">
                <a href="{{ route('links.index') }}" class="flex-1 bg-gray-300 text-gray-800 font-bold py-3 rounded-xl hover:shadow-lg transition duration-200 text-center hover:scale-105 transform">
                    ❌ Cancelar
                </a>
                <button
                    type="submit"
                    class="flex-1 bg-gradient-to-r from-red-600 to-pink-600 text-white font-bold py-3 rounded-xl hover:shadow-lg transition duration-200 hover:scale-105 transform"
                >
                    🗑️ Deletar Perfil Permanentemente
                </button>
            </div>
        </form>

        <!-- Info -->
        <div class="mt-8 bg-blue-50 rounded-xl p-4 border border-blue-200">
            <p class="text-blue-700 text-sm">
                <span class="font-bold">💡 Dica:</span> Se mudou de ideia, basta não fazer nada e sua conta permanecerá intacta.
            </p>
        </div>
    </div>
</div>
@endsection
