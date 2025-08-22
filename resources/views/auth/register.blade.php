@extends('layouts.app')

@section('title', 'Registrar')

@section('content')
<div class="h-full flex items-center justify-center px-4 py-8">
    <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md">
        <div class="px-6 py-6">
            {{-- Logo --}}
            <div class="flex justify-center mb-4">
                <img class="w-auto h-16" src="{{ asset('images/utn_logo.jpg') }}" alt="Logo">
            </div>

            <h3 class="text-xl font-bold text-center text-gray-700">
                Crear Cuenta
            </h3>
            <p class="mt-1 text-center text-gray-600 text-sm">
                Regístrate para comenzar
            </p>

            <form method="POST" action="{{ route('register') }}" class="mt-6">
                @csrf

                {{-- Nombre --}}
                <div class="mb-4">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        placeholder="Nombre completo"
                        class="block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg 
                               focus:border-teal-400 focus:ring focus:ring-teal-300 focus:ring-opacity-40
                               focus:outline-none @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        placeholder="Correo electrónico"
                        class="block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg 
                               focus:border-teal-400 focus:ring focus:ring-teal-300 focus:ring-opacity-40
                               focus:outline-none @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Contraseña --}}
                <div class="mb-4">
                    <input id="password" type="password" name="password" required
                        placeholder="Contraseña"
                        class="block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg 
                               focus:border-teal-400 focus:ring focus:ring-teal-300 focus:ring-opacity-40
                               focus:outline-none @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirmar Contraseña --}}
                <div class="mb-6">
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        placeholder="Confirmar contraseña"
                        class="block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg 
                               focus:border-teal-400 focus:ring focus:ring-teal-300 focus:ring-opacity-40
                               focus:outline-none">
                </div>

                {{-- Botón --}}
                <button type="submit"
                    class="w-full px-4 py-2 font-semibold text-white transition-colors duration-300 transform bg-teal-500 rounded-lg hover:bg-teal-400 focus:outline-none focus:ring focus:ring-teal-500 focus:ring-opacity-50">
                    Registrar
                </button>
            </form>
        </div>

        {{-- Pie con link a login --}}
        <div class="flex items-center justify-center py-4 text-center bg-gray-50">
            <span class="text-sm text-gray-600">¿Ya tienes una cuenta?</span>
            <a href="{{ route('login') }}" 
               class="ml-2 text-sm font-bold text-teal-300 hover:underline">
                Iniciar Sesión
            </a>
        </div>
    </div>
</div>
@endsection
