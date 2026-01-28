@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-100px)]">
    <div class="w-full max-w-md">
        <!-- Card with Glass Effect -->
        <div class="bg-white/90 backdrop-filter backdrop-blur rounded-2xl shadow-2xl p-8 border border-blue-100 animate-slideDown">
            <div class="text-center mb-8">
                <div class="inline-block text-5xl mb-3 animate-float">🔑</div>
                <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Bem-vindo de Volta!
                </h2>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">📧 Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('email') border-red-500 @enderror"
                        placeholder="seu@email.com"
                    >
                    @error('email')
                        <span class="text-red-600 text-sm mt-1 block font-semibold">⚠️ {{ $message }}</span>
                    @enderror
                </div>

                <!-- Senha -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">🔐 Senha</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('password') border-red-500 @enderror"
                        placeholder="Digite sua senha"
                    >
                    @error('password')
                        <span class="text-red-600 text-sm mt-1 block font-semibold">⚠️ {{ $message }}</span>
                    @enderror
                </div>

                <!-- Botão de Envio -->
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold py-3 rounded-xl hover:shadow-lg transition duration-200 hover:scale-105 transform mt-6"
                >
                    🚀 Entrar
                </button>
            </form>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-600">ou</span>
                </div>
            </div>

            <!-- Link para Registro -->
            <p class="text-center text-gray-700 mb-4">
                Não tem uma conta?
            </p>
            <a href="{{ route('register') }}" class="w-full block text-center bg-gradient-to-r from-green-500 to-green-600 text-white font-bold py-3 rounded-xl hover:shadow-lg transition duration-200 hover:scale-105 transform">
                ✨ Criar Conta Grátis
            </a>
        </div>

        <!-- Info Footer -->
        <div class="text-center mt-6 text-gray-600 text-sm">
            <p>🔒 Seus dados estão seguros e criptografados</p>
        </div>
    </div>
</div>
@endsection
