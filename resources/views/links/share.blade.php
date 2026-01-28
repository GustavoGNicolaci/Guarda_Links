@extends('layouts.app')

@section('title', 'Compartilhando Links de ' . $user->name)

@section('content')
<div class="max-w-6xl mx-auto animate-slideDown">
    <!-- Header do Compartilhamento -->
    <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-green-600 rounded-3xl p-10 mb-12 text-center text-white shadow-2xl">
        <div class="mb-6 animate-float">
            <span class="text-6xl">🔗</span>
        </div>
        <h1 class="text-5xl font-bold mb-2">{{ $user->name }}</h1>
        <p class="text-blue-100 text-lg mb-6">Confira todos os meus links pessoais e redes sociais</p>
        
        <!-- Botão de Copiar URL de Compartilhamento -->
        <div class="flex justify-center gap-3 flex-wrap">
            <div class="flex gap-2 w-full max-w-md">
                <input type="text" id="shareUrl" value="{{ request()->url() }}" readonly 
                    class="flex-1 px-4 py-3 border-2 border-white/30 rounded-xl bg-white/10 backdrop-filter backdrop-blur text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white text-sm">
                <button onclick="copiarUrl()" class="bg-white text-purple-600 px-6 py-3 rounded-xl hover:shadow-lg transition font-bold hover:scale-105 transform whitespace-nowrap">
                    📋 Copiar
                </button>
            </div>
        </div>
    </div>

    @if($links->count() > 0)
        <!-- Lista de Links Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
            @foreach($links as $link)
                <div class="group bg-white/80 backdrop-filter backdrop-blur rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 p-6 border-l-4 border-blue-500 hover:border-purple-600 transform hover:scale-105">
                    <!-- Cabeçalho do Link -->
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-800 group-hover:text-blue-600 transition mb-2">
                                {{ $link->name }}
                            </h3>
                            @if($link->platform)
                                <span class="inline-block px-4 py-1 bg-gradient-to-r from-blue-100 to-purple-100 text-blue-700 rounded-full text-sm font-bold">
                                    📍 {{ $link->platform }}
                                </span>
                            @endif
                        </div>
                        <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" 
                            class="text-3xl text-blue-600 hover:text-purple-600 transition hover:scale-125 transform" 
                            title="Abrir link em nova aba">
                            ↗️
                        </a>
                    </div>

                    <!-- Descrição -->
                    @if($link->description)
                        <p class="text-gray-600 mb-4 text-base leading-relaxed">{{ $link->description }}</p>
                    @endif

                    <!-- URL do Link -->
                    <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-4 mb-4 border border-blue-100">
                        <p class="text-gray-600 text-xs font-bold mb-2 uppercase tracking-wider">🔗 Link:</p>
                        <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" 
                            class="text-blue-600 hover:text-purple-600 break-all text-sm font-semibold hover:underline transition">
                            {{ \Illuminate\Support\Str::limit($link->url, 60) }}
                        </a>
                    </div>

                    <!-- Data de Criação -->
                    <div class="flex items-center justify-between">
                        <div class="text-gray-500 text-xs font-semibold">
                            ⏰ {{ $link->created_at->format('d/m/Y') }}
                        </div>
                        <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" 
                            class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-4 py-2 rounded-lg text-sm font-bold hover:shadow-lg transition hover:scale-105 transform">
                            Visitar
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Stats -->
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-6 mb-8 border-2 border-green-200 text-center">
            <p class="text-gray-700 font-bold">
                <span class="text-3xl text-green-600">{{ $links->count() }}</span>
                <span class="text-lg ml-2">link{{ $links->count() > 1 ? 's' : '' }} compartilhado{{ $links->count() > 1 ? 's' : '' }}</span>
            </p>
        </div>
    @else
        <!-- Estado Vazio -->
        <div class="text-center py-16 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl border-2 border-gray-200 shadow-md">
            <div class="text-8xl mb-4 animate-pulse">📭</div>
            <h3 class="text-3xl font-bold text-gray-800 mb-3">Nenhum link compartilhado</h3>
            <p class="text-gray-600 text-lg">{{ $user->name }} ainda não tem links para compartilhar.</p>
        </div>
    @endif

    <!-- Footer com CTA -->
    <div class="mt-16 text-center py-8 bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl border-2 border-blue-200 shadow-md">
        <p class="text-gray-700 text-lg font-semibold mb-6">✨ Gostou dessa página? Crie a sua própria!</p>
        @guest
            <div class="flex gap-4 justify-center flex-wrap">
                <a href="{{ route('register') }}" class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-8 py-4 rounded-xl hover:shadow-2xl transition font-bold hover:scale-105 transform">
                    🚀 Criar Minha Conta Grátis
                </a>
                <a href="{{ route('login') }}" class="bg-white text-blue-600 px-8 py-4 rounded-xl hover:shadow-lg transition font-bold border-2 border-blue-600 hover:scale-105 transform">
                    🔑 Já tem Conta?
                </a>
            </div>
        @else
            <a href="{{ route('links.index') }}" class="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl hover:shadow-2xl transition font-bold hover:scale-105 transform">
                📋 Ir para Meus Links
            </a>
        @endguest
    </div>
</div>

<script>
function copiarUrl() {
    const shareUrl = document.getElementById('shareUrl');
    shareUrl.select();
    document.execCommand('copy');
    
    const botao = event.target;
    const textOriginal = botao.textContent;
    botao.innerHTML = '✅ Copiado!';
    botao.classList.add('!bg-green-500');
    botao.classList.remove('bg-white', 'text-purple-600');
    botao.classList.add('text-white');
    
    setTimeout(() => {
        botao.innerHTML = textOriginal;
        botao.classList.remove('!bg-green-500', 'text-white');
        botao.classList.add('bg-white', 'text-purple-600');
    }, 2000);
}
</script>

<style>
    @keyframes shimmer {
        0% { background-position: -1000px 0; }
        100% { background-position: 1000px 0; }
    }
    
    .hover\:scale-102:hover {
        transform: scale(1.02);
    }
    
    @media (prefers-color-scheme: dark) {
        .from-blue-50, .to-indigo-50, .from-gray-50 {
            background: rgba(30, 58, 138, 0.1);
        }
        
        .bg-white {
            background: #1f2937;
            color: #f3f4f6;
        }
        
        .text-gray-800 {
            color: #f3f4f6;
        }
        
        .text-gray-600 {
            color: #d1d5db;
        }
    }
</style>
@endsection
