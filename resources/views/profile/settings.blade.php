@extends('layouts.app')

@section('title', 'Configurações')

@section('content')
<div class="max-w-2xl mx-auto py-8 animate-slideDown">
    <!-- Header -->
    <div class="mb-8">
        <a href="{{ route('links.index') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold mb-4">
            ← Voltar para Meus Links
        </a>
        <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
            ⚙️ Configurações
        </h1>
        <p class="text-gray-600">Gerencie sua conta e preferências</p>
    </div>

    <!-- Profile Card -->
    <div class="bg-white/80 backdrop-filter backdrop-blur rounded-2xl shadow-xl p-8 border border-blue-100 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">👤 Informações da Conta</h2>
        
        <div class="space-y-4">
            <div class="border-b border-gray-200 pb-4">
                <p class="text-sm text-gray-600">Nome</p>
                <p class="text-lg font-semibold text-gray-800">{{ Auth::user()->name }}</p>
            </div>
            
            <div class="border-b border-gray-200 pb-4">
                <p class="text-sm text-gray-600">Email</p>
                <p class="text-lg font-semibold text-gray-800">{{ Auth::user()->email }}</p>
            </div>
            
            <div>
                <p class="text-sm text-gray-600">Membro desde</p>
                <p class="text-lg font-semibold text-gray-800">{{ Auth::user()->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Stats Card -->
    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl shadow-xl p-8 border-2 border-green-200 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">📊 Seus Links</h2>
        
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-white rounded-xl p-4 text-center">
                <p class="text-3xl font-bold text-green-600">{{ Auth::user()->links()->count() }}</p>
                <p class="text-sm text-gray-600 mt-1">Link{{ Auth::user()->links()->count() > 1 ? 's' : '' }} Criado{{ Auth::user()->links()->count() > 1 ? 's' : '' }}</p>
            </div>
            
            <div class="bg-white rounded-xl p-4 text-center">
                <p class="text-3xl font-bold text-blue-600">∞</p>
                <p class="text-sm text-gray-600 mt-1">Limite de Links</p>
            </div>
        </div>
    </div>

    <!-- Danger Zone -->
    <div class="bg-gradient-to-r from-red-50 to-pink-50 rounded-2xl p-8 border-2 border-red-300 shadow-md">
        <h2 class="text-2xl font-bold text-red-700 mb-6">🔴 Zona de Perigo</h2>
        
        <p class="text-gray-700 mb-4">
            Se deseja remover sua conta permanentemente, clique no botão abaixo. Esta ação não pode ser desfeita.
        </p>
        
        <a href="{{ route('profile.delete') }}" class="inline-block bg-red-600 text-white px-6 py-3 rounded-xl hover:bg-red-700 transition duration-200 font-bold hover:shadow-lg">
            🗑️ Deletar Minha Conta
        </a>
    </div>
</div>
@endsection
