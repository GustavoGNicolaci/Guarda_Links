@extends('layouts.app')

@section('title', 'Bem-vindo')

@section('content')
<div class="max-w-4xl mx-auto text-center">
    <!-- Hero Section -->
    <div class="mb-12">
        <h1 class="text-6xl font-bold text-gray-800 mb-4">🔗 Guarda Links</h1>
        <p class="text-xl text-gray-600 mb-8">Organize e compartilhe seus links com facilidade</p>
        <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
            Crie uma conta, centralize todos os seus links de redes sociais, portfólio e projetos em um único lugar intuitivo e fácil de gerenciar.
        </p>
    </div>

    <!-- Features -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-4xl mb-4">🛡️</div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Seguro</h3>
            <p class="text-gray-600">Seus links estão seguros e acessíveis apenas para você.</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-4xl mb-4">⚡</div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Rápido</h3>
            <p class="text-gray-600">Interface intuitiva para adicionar, editar e gerenciar links.</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-4xl mb-4">📱</div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Responsivo</h3>
            <p class="text-gray-600">Funciona perfeitamente em qualquer dispositivo.</p>
        </div>
    </div>

    <!-- CTA -->
    @guest
        <div class="bg-blue-50 rounded-lg p-8 mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Comece Agora</h2>
            <div class="flex gap-4 justify-center flex-wrap">
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-200 text-lg font-semibold">
                    Criar Conta Grátis
                </a>
                <a href="{{ route('login') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg hover:bg-gray-100 transition duration-200 text-lg font-semibold border border-blue-600">
                    Já tem conta? Faça Login
                </a>
            </div>
        </div>
    @else
        <div class="bg-green-50 rounded-lg p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Bem-vindo, {{ Auth::user()->name }}!</h2>
            <a href="{{ route('links.index') }}" class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition duration-200 text-lg font-semibold">
                Ir para Meus Links →
            </a>
        </div>
    @endguest
</div>
@endsection
