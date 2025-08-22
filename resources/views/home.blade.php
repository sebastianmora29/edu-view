@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <section class="bg-gray-50 flex items-center justify-center min-h-[calc(100vh-140px)]">
        <div class="max-w-4xl mx-auto px-6 py-12 text-center">
            <h1 class="text-5xl lg:text-6xl font-extrabold mb-4 text-gray-800">
                Bienvenido a <span class="text-teal-200">EduView</span>
            </h1>
            <p class="text-lg lg:text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                 Perfiles de Alumnos
            </p>

        <div class="mb-10">
            <img src="{{ asset('images/usuarios.jpeg') }}" alt="Imagen bienvenida" class="mx-auto w-64 h-auto rounded-lg shadow-lg">
        </div>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('register') }}" 
                   class="px-8 py-4 text-lg font-semibold rounded-lg bg-teal-500 text-white shadow-md hover:bg-teal-400 transition">
                    Registrarse
                </a>
                <a href="{{ route('login') }}" 
                   class="px-8 py-4 text-lg font-semibold rounded-lg bg-gray-200 text-gray-700 shadow-md hover:bg-gray-300 transition">
                    Iniciar Sesión
                </a>
            </div>
        </div>
    </section>
@endsection