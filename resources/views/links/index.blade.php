@extends('layouts.app')

@section('title', 'Meus Links')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">Meus Links</h1>
        <a href="{{ route('links.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
            + Adicionar Link
        </a>
    </div>

    @if ($links->isEmpty())
        <div class="bg-gray-100 rounded-lg p-12 text-center">
            <p class="text-gray-600 text-lg mb-4">Você ainda não tem nenhum link salvo.</p>
            <a href="{{ route('links.create') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                Criar seu primeiro link
            </a>
        </div>
    @else
        <div class="grid gap-4">
            @foreach ($links as $link)
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition duration-200">
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

                        <div class="flex gap-2 ml-4">
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

                    <div class="text-xs text-gray-400 mt-4">
                        Criado em: {{ $link->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
