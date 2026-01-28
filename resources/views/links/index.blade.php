@extends('layouts.app')

@section('title', 'Meus Links')

@section('content')
<div class="max-w-5xl mx-auto animate-slideDown">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex justify-between items-center mb-2">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
                    📋 Meus Links
                </h1>
                <p class="text-gray-600">Gerencie todos os seus links em um único lugar</p>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex gap-3 mb-8 flex-wrap">
        <a href="{{ route('links.share', auth()->user()) }}" class="gradient-accent text-white px-6 py-3 rounded-xl hover:shadow-lg hover:scale-105 transition duration-200 font-semibold flex items-center gap-2 transform">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C9.589 12.938 10 12.016 10 11c0-.82-.402-1.644-1.342-2.206m0 0a9.968 9.968 0 00-2.343-.436m2.343.436l-4.686-2.343m11.986 3.793c.128.814.14 1.693.122 2.606a1 1 0 01-.019.077m1.833-6.308a9.968 9.968 0 00-2.343-.436m2.343.436l4.686-2.343m0 11.986a9.933 9.933 0 01-1.343 2.206M12 20.25a9.933 9.933 0 01-1.343-2.206m0-11.972a9.933 9.933 0 011.343-2.206m2.657 9.972c.128.814.14 1.693.122 2.606a1 1 0 01-.019.077m0-16.334a9.968 9.968 0 00-2.343-.436m2.343.436l-4.686-2.343"></path>
            </svg>
            🎯 Compartilhar
        </a>
        <a href="{{ route('links.create') }}" class="gradient-brand text-white px-6 py-3 rounded-xl hover:shadow-lg hover:scale-105 transition duration-200 font-semibold flex items-center gap-2 transform">
            <span>✨</span> Novo Link
        </a>
    </div>

    @if ($links->isEmpty())
        <!-- Empty State -->
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 border-2 border-blue-200 text-center shadow-md">
                <div class="text-6xl mb-4">🔗</div>
                <p class="text-gray-700 text-lg font-semibold mb-2">Nenhum link ainda</p>
                <p class="text-gray-600 text-sm mb-6">Comece criando seu primeiro link para compartilhar</p>
                <a href="{{ route('links.create') }}" class="inline-block gradient-brand text-white px-6 py-3 rounded-xl hover:shadow-lg transition duration-200 font-bold">
                    🚀 Criar Meu Primeiro Link
                </a>
            </div>
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 border-2 border-green-200 shadow-md">
                <div class="text-6xl mb-4 text-center">👥</div>
                <p class="text-center text-gray-700 text-lg font-semibold mb-2">Compartilhe sua página</p>
                <p class="text-gray-600 text-sm mb-4 text-center">Ao adicionar links, você poderá gerar um link compartilhável para sua página pública</p>
                <p class="text-xs text-gray-500 text-center">✓ Seus links serão vistos em uma página elegante com seu perfil</p>
            </div>
        </div>
    @else
        <!-- Links Grid -->
        <div class="space-y-4">
            @foreach ($links as $link)
                <div class="group bg-white/80 backdrop-filter backdrop-blur rounded-2xl shadow-md hover:shadow-2xl transition duration-300 border-l-4 border-l-green-500 p-6 hover:bg-white transform hover:scale-102 border border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <!-- Left Section -->
                        <div class="flex-1 w-full">
                            <div class="flex items-center gap-3 mb-2">
                                <span class="inline-block bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 text-xs px-3 py-1 rounded-full font-bold">
                                    ✓ Compartilhável
                                </span>
                                @if ($link->platform)
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full font-semibold">
                                        {{ $link->platform }}
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-blue-600 transition">
                                {{ $link->name }}
                            </h3>

                            @if ($link->description)
                                <p class="text-gray-600 mb-3 text-sm">{{ $link->description }}</p>
                            @endif

                            <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" class="inline-block text-blue-600 hover:text-blue-800 break-all text-sm font-semibold hover:underline">
                                🔗 {{ substr($link->url, 0, 50) }}{{ strlen($link->url) > 50 ? '...' : '' }}
                            </a>

                            <p class="text-xs text-gray-400 mt-3">
                                📅 Criado em: {{ $link->created_at->format('d/m/Y H:i') }}
                            </p>
                        </div>

                        <!-- Right Section - Actions -->
                        <div class="flex gap-2 w-full md:w-auto">
                            <a href="{{ route('links.edit', $link->id) }}" class="flex-1 md:flex-none bg-gradient-warm text-white px-4 py-3 rounded-xl hover:shadow-lg transition duration-200 font-bold text-center hover:scale-105 transform">
                                ✏️ Editar
                            </a>
                            <form action="{{ route('links.destroy', $link->id) }}" method="POST" class="inline flex-1 md:flex-none" onsubmit="return confirm('Deseja deletar este link? Esta ação não pode ser desfeita.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-xl hover:shadow-lg transition duration-200 font-bold hover:scale-105 transform">
                                    🗑️ Deletar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Info Card -->
        <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-2xl p-6 mt-8 border-2 border-purple-200 text-center shadow-md">
            <p class="text-gray-700 font-semibold mb-2">💡 Dica: Você tem <span class="text-2xl text-green-600">{{ $links->count() }}</span> link(s) criado(s)</p>
            <p class="text-gray-600 text-sm">Compartilhe sua página pública para que outras pessoas vejam todos os seus links!</p>
        </div>
    @endif
</div>
@endsection
