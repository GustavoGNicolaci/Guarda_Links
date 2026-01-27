@extends('layouts.app')

@section('title', 'Criar Novo Link')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-4xl font-bold text-gray-800 mb-8">Criar Novo Link</h1>

    <div class="bg-white rounded-lg shadow p-8">
        <form action="{{ route('links.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Nome do Link -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nome do Link</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                    placeholder="Ex: Meu GitHub, Portfólio, etc."
                >
                @error('name')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- URL -->
            <div>
                <label for="url" class="block text-sm font-medium text-gray-700 mb-2">URL</label>
                <input
                    type="url"
                    id="url"
                    name="url"
                    value="{{ old('url') }}"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('url') border-red-500 @enderror"
                    placeholder="https://exemplo.com"
                >
                @error('url')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Plataforma/Rede Social -->
            <div>
                <label for="platform" class="block text-sm font-medium text-gray-700 mb-2">Plataforma (Opcional)</label>
                <select
                    id="platform"
                    name="platform"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('platform') border-red-500 @enderror"
                >
                    <option value="">-- Selecione uma plataforma --</option>
                    <option value="GitHub" {{ old('platform') == 'GitHub' ? 'selected' : '' }}>GitHub</option>
                    <option value="LinkedIn" {{ old('platform') == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                    <option value="Twitter" {{ old('platform') == 'Twitter' ? 'selected' : '' }}>Twitter</option>
                    <option value="Instagram" {{ old('platform') == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                    <option value="Facebook" {{ old('platform') == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                    <option value="YouTube" {{ old('platform') == 'YouTube' ? 'selected' : '' }}>YouTube</option>
                    <option value="Portfólio" {{ old('platform') == 'Portfólio' ? 'selected' : '' }}>Portfólio</option>
                    <option value="Blog" {{ old('platform') == 'Blog' ? 'selected' : '' }}>Blog</option>
                    <option value="Outro" {{ old('platform') == 'Outro' ? 'selected' : '' }}>Outro</option>
                </select>
                @error('platform')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Descrição -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Descrição (Opcional)</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror"
                    placeholder="Adicione uma descrição para este link..."
                >{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botões -->
            <div class="flex gap-4">
                <button
                    type="submit"
                    class="flex-1 bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-200"
                >
                    Salvar Link
                </button>
                <a
                    href="{{ route('links.index') }}"
                    class="flex-1 bg-gray-400 text-white font-semibold py-2 rounded-lg hover:bg-gray-500 transition duration-200 text-center"
                >
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
