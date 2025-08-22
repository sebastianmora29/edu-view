<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'EduView')</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 text-gray-900 flex flex-col min-h-screen">

    <header class="bg-gray-100 shadow fixed w-full z-20 top-0 left-0 border-b border-gray-300">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between p-4">
        <a href="
            @auth
                {{ auth()->user()->role === 'alumno' ? route('alumno.dashboard') : route('profesor.dashboard') }}
            @else
                /
            @endauth
        " class="text-2xl font-bold text-gray-700">
            EduView
        </a>

        <nav class="flex items-center gap-4">
            @auth
                <span class="hidden sm:inline text-gray-700">
                    👋 Hola, <strong>{{ auth()->user()->name }}</strong>
                </span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg shadow transition">
                        Cerrar Sesión
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" 
                    class="px-4 py-2 font-medium rounded-lg bg-gray-200 text-gray-700 shadow-sm hover:bg-gray-300 transition">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}"
                    class="bg-teal-500 hover:bg-teal-400 text-white px-4 py-2 rounded-lg shadow transition">
                    Registrarse
                </a>
            @endauth
        </nav>
    </div>
</header>


    <main class="flex-grow pt-24 pb-12">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-screen-xl mx-auto p-4 flex flex-col sm:flex-row justify-between items-center text-sm text-gray-500">
            <span>© {{ date('Y') }} <strong>EduView</strong>. Todos los derechos reservados.</span>
            <div class="flex gap-4 mt-2 sm:mt-0">
                <a href="#" class="hover:text-blue-600">Política de Privacidad</a>
                <a href="#" class="hover:text-blue-600">Términos</a>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>
</html>