<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Guarda Links')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulse-soft {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-slideDown { animation: slideDown 0.6s ease-out; }
        .animate-pulse-soft { animation: pulse-soft 2s ease-in-out infinite; }
        .gradient-brand { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); }
        .gradient-accent { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .gradient-warm { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-green-50 min-h-screen">
    <!-- Navbar -->
    <nav class="glass-effect sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold gradient-brand bg-clip-text text-transparent hover:opacity-80 transition duration-200 flex items-center gap-2 animate-slideDown">
                        <span class="animate-float">🔗</span> Guarda Links
                    </a>
                </div>

                <div class="flex items-center gap-4">
                    @auth
                        <div class="hidden sm:flex items-center gap-1 px-3 py-1 rounded-full bg-gradient-to-r from-blue-100 to-green-100">
                            <span class="text-sm font-medium text-gray-800">👤 {{ Auth::user()->name }}</span>
                        </div>
                        <a href="{{ route('links.index') }}" class="text-gray-700 hover:text-blue-600 font-medium transition duration-200 px-3 py-2 rounded-lg hover:bg-blue-50">
                            <span class="hidden sm:inline">📋</span> Meus Links
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-red-600 font-medium transition duration-200 px-3 py-2 rounded-lg hover:bg-red-50">
                                <span class="hidden sm:inline">🚪</span> Sair
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium transition duration-200 px-3 py-2 rounded-lg hover:bg-blue-50">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="gradient-brand text-white px-5 py-2 rounded-lg hover:shadow-lg hover:scale-105 transition duration-200 font-semibold">
                            Registrar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Messages -->
    @if ($errors->any())
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 animate-slideDown">
            <div class="bg-gradient-to-r from-red-100 to-pink-100 border-2 border-red-300 text-red-700 px-4 py-4 rounded-lg shadow-md">
                <div class="font-semibold mb-2 flex items-center gap-2">
                    <span>⚠️</span> Ocorreram erros:
                </div>
                <ul class="space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if (session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 animate-slideDown">
            <div class="bg-gradient-to-r from-green-100 to-emerald-100 border-2 border-green-400 text-green-700 px-4 py-4 rounded-lg shadow-md font-semibold flex items-center gap-2">
                <span>✅</span> {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-center text-gray-600">
            <p>&copy; 2026 Guarda Links. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
