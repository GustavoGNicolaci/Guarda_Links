@extends('layouts.app')

@section('title', 'Criar Novo Link')

@section('content')
<div class="max-w-2xl mx-auto py-8 animate-slideDown">
    <!-- Header -->
    <div class="mb-8">
        <a href="{{ route('links.index') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold mb-4">
            ← Voltar para Meus Links
        </a>
        <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
            ✨ Criar Novo Link
        </h1>
        <p class="text-gray-600">Adicione um novo link à sua página</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white/80 backdrop-filter backdrop-blur rounded-2xl shadow-xl p-8 border border-blue-100">
        <form action="{{ route('links.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Nome do Link -->
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-3">📝 Nome do Link</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('name') border-red-500 @enderror"
                    placeholder="Ex: Meu GitHub, Portfólio, etc."
                >
                @error('name')
                    <span class="text-red-600 text-sm mt-2 font-semibold block">⚠️ {{ $message }}</span>
                @enderror
            </div>

            <!-- URL -->
            <div>
                <label for="url" class="block text-sm font-bold text-gray-700 mb-3">🔗 URL</label>
                <input
                    type="url"
                    id="url"
                    name="url"
                    value="{{ old('url') }}"
                    required
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('url') border-red-500 @enderror"
                    placeholder="https://exemplo.com"
                >
                @error('url')
                    <span class="text-red-600 text-sm mt-2 font-semibold block">⚠️ {{ $message }}</span>
                @enderror
            </div>

            <!-- Plataforma/Rede Social -->
            <div>
                <label for="platform" class="block text-sm font-bold text-gray-700 mb-3">📍 Plataforma (Opcional)</label>
                <select
                    id="platform"
                    name="platform"
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('platform') border-red-500 @enderror bg-white"
                >
                    <option value="">-- Selecione uma plataforma --</option>
                    <option value="GitHub" {{ old('platform') == 'GitHub' ? 'selected' : '' }}>🐙 GitHub</option>
                    <option value="LinkedIn" {{ old('platform') == 'LinkedIn' ? 'selected' : '' }}>💼 LinkedIn</option>
                    <option value="Twitter" {{ old('platform') == 'Twitter' ? 'selected' : '' }}>𝕏 Twitter</option>
                    <option value="Instagram" {{ old('platform') == 'Instagram' ? 'selected' : '' }}>📸 Instagram</option>
                    <option value="Facebook" {{ old('platform') == 'Facebook' ? 'selected' : '' }}>👍 Facebook</option>
                    <option value="YouTube" {{ old('platform') == 'YouTube' ? 'selected' : '' }}>🎥 YouTube</option>
                    <option value="TikTok" {{ old('platform') == 'TikTok' ? 'selected' : '' }}>🎵 TikTok</option>
                    <option value="Discord" {{ old('platform') == 'Discord' ? 'selected' : '' }}>💬 Discord</option>
                    <option value="Portfólio" {{ old('platform') == 'Portfólio' ? 'selected' : '' }}>🎨 Portfólio</option>
                    <option value="Blog" {{ old('platform') == 'Blog' ? 'selected' : '' }}>📝 Blog</option>
                    <option value="Outro" {{ old('platform') == 'Outro' ? 'selected' : '' }}>🔗 Outro</option>
                </select>
                @error('platform')
                    <span class="text-red-600 text-sm mt-2 font-semibold block">⚠️ {{ $message }}</span>
                @enderror
            </div>

            <!-- Descrição -->
            <div>
                <label for="description" class="block text-sm font-bold text-gray-700 mb-3">💬 Descrição (Opcional)</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('description') border-red-500 @enderror resize-none"
                    placeholder="Adicione uma descrição para este link... (Ex: Acesse meu portfólio completo com todos os meus projetos)"
                >{{ old('description') }}</textarea>
                <p class="text-gray-500 text-xs mt-2">Máximo 255 caracteres</p>
                @error('description')
                    <span class="text-red-600 text-sm mt-2 font-semibold block">⚠️ {{ $message }}</span>
                @enderror
            </div>

            <!-- Botões -->
            <div class="flex gap-4 pt-6">
                <button
                    type="submit"
                    class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold py-3 rounded-xl hover:shadow-lg transition duration-200 hover:scale-105 transform"
                >
                    ✅ Criar Link
                </button>
                <a href="{{ route('links.index') }}" class="flex-1 bg-gray-300 text-gray-800 font-bold py-3 rounded-xl hover:shadow-lg transition duration-200 text-center hover:scale-105 transform">
                    ❌ Cancelar
                </a>
            </div>
        </form>
    </div>

    <!-- Info Card -->
    <div class="mt-8 bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 border-2 border-blue-200">
        <p class="text-gray-700 font-semibold mb-2">💡 Dica:</p>
        <p class="text-gray-600 text-sm">Use nomes descritivos e plataformas precisas. Isso ajuda quem visita sua página a entender melhor cada link.</p>
    </div>
</div>
@endsection
