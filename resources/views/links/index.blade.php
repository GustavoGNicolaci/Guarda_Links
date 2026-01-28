@extends('layouts.app')

@section('title', 'Meus Links')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">Meus Links</h1>
        <div class="flex gap-3">
            <a href="{{ route('links.share', auth()->user()) }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-200 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C9.589 12.938 10 12.016 10 11c0-.82-.402-1.644-1.342-2.206m0 0a9.968 9.968 0 00-2.343-.436m2.343.436l-4.686-2.343m11.986 3.793c.128.814.14 1.693.122 2.606a1 1 0 01-.019.077m1.833-6.308a9.968 9.968 0 00-2.343-.436m2.343.436l4.686-2.343m0 11.986a9.933 9.933 0 01-1.343 2.206M12 20.25a9.933 9.933 0 01-1.343-2.206m0-11.972a9.933 9.933 0 011.343-2.206m2.657 9.972c.128.814.14 1.693.122 2.606a1 1 0 01-.019.077m0-16.334a9.968 9.968 0 00-2.343-.436m2.343.436l-4.686-2.343"></path>
                </svg>
                Compartilhar
            </a>
            <a href="{{ route('links.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                + Adicionar Link
            </a>
        </div>
    </div>

    @if ($links->isEmpty())
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg p-8 border border-blue-200 text-center">
                <svg class="w-16 h-16 mx-auto text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.658 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                </svg>
                <p class="text-gray-700 text-lg font-semibold mb-2">Nenhum link ainda</p>
                <p class="text-gray-600 text-sm mb-4">Comece criando seu primeiro link para compartilhar</p>
                <a href="{{ route('links.create') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                    Criar seu primeiro link
                </a>
            </div>
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-lg p-8 border border-green-200">
                <svg class="w-16 h-16 mx-auto text-green-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
                <p class="text-center text-gray-700 text-lg font-semibold mb-2">Compartilhe sua página</p>
                <p class="text-gray-600 text-sm mb-4 text-center">Ao adicionar links, você poderá gerar um link compartilhável para sua página pública</p>
                <p class="text-xs text-gray-500 text-center">Seus links serão vistos em uma página elegante com seu perfil</p>
            </div>
        </div>
    @else
        <div class="grid gap-4">
            @foreach ($links as $link)
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition duration-200 border-l-4 border-l-green-500">
                    <div class="flex justify-between items-start mb-3">
                        <div class="flex items-center gap-2">
                            <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-semibold">
                                ✓ Compartilhável
                            </span>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('links.edit', $link->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-200">
                                Editar
                            </a>
                            <form action="{{ route('links.destroy', $link->id) }}" method="POST" class="inline" onsubmit="return confirm('Deseja deletar este link?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-200">
                                    Deletar
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800">{{ $link->name }}</h3>
                            
                            @if ($link->platform)
                                <p class="text-sm text-gray-500 mt-1">
                                    <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded">
                                        {{ $link->platform }}
                                    </span>
                                </p>
                            @endif

                            @if ($link->description)
                                <p class="text-gray-600 mt-2">{{ $link->description }}</p>
                            @endif

                            <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" class="inline-block mt-3 text-blue-600 hover:text-blue-800 break-all">
                                {{ $link->url }}
                            </a>
                        </div>
                    </div>

                    <div class="text-xs text-gray-400 mt-4">
                        Criado em: {{ $link->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
