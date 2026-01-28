@extends('layouts.app')

@section('title', 'Compartilhando Links de ' . $user->name)

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header do Compartilhamento -->
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-8 mb-8 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">🔗 {{ $user->name }}</h1>
        <p class="text-gray-600 mb-4">Confira todos os meus links pessoais</p>
        
        <!-- Botão de Copiar URL de Compartilhamento -->
        <div class="flex justify-center gap-3">
            <input type="text" id="shareUrl" value="{{ request()->url() }}" readonly 
                class="px-4 py-2 border border-gray-300 rounded-lg bg-white text-gray-700 w-full max-w-md">
            <button onclick="copiarUrl()" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                Copiar Link
            </button>
        </div>
    </div>

    @if($links->count() > 0)
        <!-- Lista de Links -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($links as $link)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition p-6 border-l-4 border-blue-500">
                    <!-- Cabeçalho do Link -->
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">{{ $link->name }}</h3>
                            @if($link->platform)
                                <span class="inline-block mt-1 px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                                    {{ $link->platform }}
                                </span>
                            @endif
                        </div>
                        <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" 
                            class="text-blue-600 hover:text-blue-800 text-2xl" title="Abrir link">
                            ↗
                        </a>
                    </div>

                    <!-- Descrição -->
                    @if($link->description)
                        <p class="text-gray-600 mb-4 text-sm">{{ $link->description }}</p>
                    @endif

                    <!-- URL do Link -->
                    <div class="bg-gray-50 rounded p-3 mb-4">
                        <p class="text-gray-600 text-xs font-medium mb-1">Link:</p>
                        <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" 
                            class="text-blue-600 hover:text-blue-800 break-all text-sm">
                            {{ \Illuminate\Support\Str::limit($link->url, 50) }}
                        </a>
                    </div>

                    <!-- Data de Criação -->
                    <div class="text-gray-500 text-xs">
                        Adicionado há {{ $link->created_at->diffForHumans() }}
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Estado Vazio -->
        <div class="text-center py-12 bg-gray-50 rounded-lg">
            <div class="text-6xl mb-4">📭</div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Nenhum link compartilhado</h3>
            <p class="text-gray-600">{{ $user->name }} ainda não tem links para compartilhar.</p>
        </div>
    @endif

    <!-- Footer com CTA -->
    <div class="mt-12 text-center">
        <p class="text-gray-600 mb-6">Gostou? Crie sua própria página de links!</p>
        @guest
            <a href="{{ route('register') }}" class="inline-block bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-3 rounded-lg hover:shadow-lg transition font-semibold">
                Começar Agora →
            </a>
        @else
            <a href="{{ route('links.index') }}" class="inline-block bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-3 rounded-lg hover:shadow-lg transition font-semibold">
                Meus Links →
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
    botao.textContent = '✓ Copiado!';
    botao.classList.add('bg-green-600');
    botao.classList.remove('bg-blue-600');
    
    setTimeout(() => {
        botao.textContent = textOriginal;
        botao.classList.remove('bg-green-600');
        botao.classList.add('bg-blue-600');
    }, 2000);
}
</script>

<style>
    @media (prefers-color-scheme: dark) {
        .from-blue-50, .to-indigo-50 {
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
        
        .bg-gray-50 {
            background: #374151;
        }
    }
</style>
@endsection
