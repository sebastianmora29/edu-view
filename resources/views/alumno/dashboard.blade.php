@extends('layouts.app')

@section('title', 'Dashboard Alumno')

@section('content')
<section class="h-full flex items-center justify-center px-4 py-8">
    <div class="max-w-4xl mx-auto px-6 py-12 text-center">
        @auth
            <h1 class="text-5xl lg:text-6xl font-extrabold mb-4 text-gray-800">
                ¡Bienvenido, {{ auth()->user()->name }}!
            </h1>
            <p class="text-lg lg:text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                Este es tu panel de alumno. Desde aquí podés acceder a tu información personal y académica.
            </p>
            <div class="mb-10">
                <img src="{{ asset('images/usuarios.jpeg') }}" alt="Imagen bienvenida" class="mx-auto w-64 h-auto rounded-lg shadow-lg">
            </div>
            <a href="{{ route('perfil.show') }}"
               class="px-8 py-4 text-lg font-semibold rounded-lg bg-teal-500 text-white shadow-md hover:bg-teal-400 transition">
                Ver mi perfil
            </a>
        @else
            <h1 class="text-5xl lg:text-6xl font-extrabold mb-4 text-gray-800">¡Bienvenido!</h1>
            <p class="text-lg lg:text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                Por favor, inicia sesión como alumno para continuar.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('register') }}"
                   class="px-8 py-4 text-lg font-semibold rounded-lg bg-teal-500 text-white shadow-md hover:bg-teal-400 transition">
                    Registrar
                </a>
                <a href="{{ route('login') }}"
                   class="px-8 py-4 text-lg font-semibold rounded-lg bg-gray-200 text-gray-700 shadow-md hover:bg-gray-300 transition">
                    Iniciar Sesión
                </a>
            </div>
        @endauth
    </div>
</section>
@endsection
