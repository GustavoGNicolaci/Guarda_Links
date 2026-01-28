@extends('layouts.app')

@section('title', 'Bem-vindo')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Hero Section -->
    <div class="mb-16 pt-8 animate-slideDown">
        <div class="text-center mb-12">
            <div class="inline-block mb-4 animate-float">
                <span class="text-7xl">🔗</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-green-600 bg-clip-text text-transparent mb-4">
                Guarda Links
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 mb-4">Organize e compartilhe todos os seus links em um único lugar</p>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                Crie sua conta gratuitamente e comece a centralizar todos os seus links de redes sociais, portfólio e projetos em um único lugar intuitivo e fácil de gerenciar.
            </p>
        </div>
    </div>

    <!-- Features Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
        <div class="bg-white/80 backdrop-filter backdrop-blur rounded-2xl shadow-lg p-8 hover:shadow-2xl transition duration-300 hover:scale-105 border border-blue-100">
            <div class="text-5xl mb-4 animate-float">🛡️</div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">100% Seguro</h3>
            <p class="text-gray-600">Seus links estão protegidos e acessíveis apenas para você. Criptografia de ponta a ponta.</p>
        </div>

        <div class="bg-white/80 backdrop-filter backdrop-blur rounded-2xl shadow-lg p-8 hover:shadow-2xl transition duration-300 hover:scale-105 border border-green-100">
            <div class="text-5xl mb-4 animate-float" style="animation-delay: 0.2s;">⚡</div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Rápido e Leve</h3>
            <p class="text-gray-600">Interface intuitiva para adicionar, editar e gerenciar seus links em segundos.</p>
        </div>

        <div class="bg-white/80 backdrop-filter backdrop-blur rounded-2xl shadow-lg p-8 hover:shadow-2xl transition duration-300 hover:scale-105 border border-purple-100">
            <div class="text-5xl mb-4 animate-float" style="animation-delay: 0.4s;">📱</div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Responsivo</h3>
            <p class="text-gray-600">Funciona perfeitamente em desktop, tablet e qualquer dispositivo móvel.</p>
        </div>
    </div>

    <!-- Additional Features -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-16">
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 border border-blue-200">
            <div class="flex items-start gap-4">
                <span class="text-4xl">🎨</span>
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Design Moderno</h3>
                    <p class="text-gray-700">Interface elegante e contemporânea que se adapta a qualquer estilo.</p>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 border border-green-200">
            <div class="flex items-start gap-4">
                <span class="text-4xl">🔄</span>
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Sincronização Instantânea</h3>
                    <p class="text-gray-700">Seus links são atualizados em tempo real em todos os seus dispositivos.</p>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 border border-purple-200">
            <div class="flex items-start gap-4">
                <span class="text-4xl">👥</span>
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Compartilhamento Fácil</h3>
                    <p class="text-gray-700">Compartilhe sua página pública com um único link para todos verem seus links.</p>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-2xl p-8 border border-yellow-200">
            <div class="flex items-start gap-4">
                <span class="text-4xl">📊</span>
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Gerenciamento Fácil</h3>
                    <p class="text-gray-700">Organize seus links por categorias, plataformas e descrições personalizadas.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    @guest
        <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-green-600 rounded-3xl p-12 mb-8 shadow-2xl text-center animate-slideDown">
            <h2 class="text-4xl font-bold text-white mb-4">Comece Agora, É Totalmente Grátis!</h2>
            <p class="text-blue-100 text-lg mb-8 max-w-2xl mx-auto">
                Junte-se a milhares de usuários que já estão organizando e compartilhando seus links com facilidade.
            </p>
            <div class="flex gap-4 justify-center flex-wrap">
                <a href="{{ route('register') }}" class="bg-white text-blue-600 px-8 py-4 rounded-xl hover:shadow-2xl transition duration-200 text-lg font-bold hover:scale-105 transform">
                    🚀 Criar Conta Grátis
                </a>
                <a href="{{ route('login') }}" class="bg-blue-800 text-white px-8 py-4 rounded-xl hover:bg-blue-900 transition duration-200 text-lg font-bold hover:scale-105 transform border-2 border-white">
                    🔑 Já tem conta? Faça Login
                </a>
            </div>
        </div>
    @else
        <div class="bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500 rounded-3xl p-12 text-center shadow-2xl animate-slideDown">
            <h2 class="text-4xl font-bold text-white mb-3">Bem-vindo de volta, {{ Auth::user()->name }}! 🎉</h2>
            <p class="text-green-100 text-lg mb-8">
                Seus links estão prontos para serem gerenciados e compartilhados.
            </p>
            <a href="{{ route('links.index') }}" class="inline-block bg-white text-green-600 px-8 py-4 rounded-xl hover:shadow-2xl transition duration-200 text-lg font-bold hover:scale-105 transform">
                📋 Ir para Meus Links →
            </a>
        </div>
    @endguest
</div>
@endsection
