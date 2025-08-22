@extends('layouts.app')

@section('content')
<div class="h-full flex items-center justify-center px-4 py-8">
    <div class="w-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-md">
        {{-- Encabezado del perfil --}}
        <div class="bg-gray-900 px-6 py-8 text-white">
            <div class="flex items-center space-x-6">
                {{-- Foto del alumno --}}
                @if($perfil->foto)
                    <img src="{{ asset('storage/' . $perfil->foto) }}" alt="Foto del alumno"
                         class="w-28 h-28 rounded-full object-cover ring-4 ring-teal-400">
                @else
                    <div class="w-28 h-28 rounded-full bg-white text-gray-500 flex items-center justify-center text-sm font-medium">
                        Sin foto
                    </div>
                @endif

                <div>
                    <h2 class="text-3xl font-bold">{{ $perfil->nombre }} {{ $perfil->apellido }}</h2>
                    <p class="text-sm text-gray-100 mt-1">DNI: {{ $perfil->dni }}</p>
                </div>
            </div>
        </div>

        {{-- Información académica y contacto --}}
        <div class="px-6 py-6 grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50">
            <div>
                <h4 class="text-lg font-semibold mb-2 text-gray-700">Información académica</h4>
                <p class="text-gray-600"><strong>Carrera:</strong> {{ $perfil->carrera }}</p>
                <p class="text-gray-600"><strong>Comisión:</strong> {{ $perfil->comision }}</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-2 text-gray-700">Contacto</h4>
                <p class="text-gray-600 flex items-center">
                    <span class="mr-2 text-green-500"><i class="fab fa-whatsapp"></i></span><strong>WhatsApp:</strong>
                    @if($perfil->telefono)
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $perfil->telefono) }}"
                           class="text-teal-600 hover:underline ml-2" target="_blank">
                            {{ $perfil->telefono }}
                        </a>
                    @else
                        <span class="ml-2">No cargado</span>
                    @endif
                </p>
                <p class="text-gray-600 flex items-center">
                    <span class="mr-2 text-blue-700"><i class="fab fa-linkedin"></i></span><strong>LinkedIn:</strong>
                    @if($perfil->linkedin)
                        <a href="{{ $perfil->linkedin }}" class="text-teal-600 hover:underline ml-2" target="_blank">
                            Ver perfil
                        </a>
                    @else
                        <span class="ml-2">No cargado</span>
                    @endif
                </p>
                <p class="text-gray-600 flex items-center">
                    <span class="mr-2 text-gray-800"><i class="fab fa-github"></i></span><strong>GitHub:</strong>
                    @if($perfil->github)
                        <a href="https://github.com/{{ $perfil->github }}" class="text-teal-600 hover:underline ml-2" target="_blank">
                            Ver perfil
                        </a>
                    @else
                        <span class="ml-2">No cargado</span>
                    @endif
                </p>
                <p class="text-gray-600"><strong>Email:</strong> {{ $perfil->user->email }}</p>
            </div>
        </div>

        {{-- Descripción personal --}}
        <div class="px-6 py-6">
            <h4 class="text-lg font-semibold mb-2 text-gray-700">Sobre el alumno</h4>
            <p class="text-gray-600">
                {{ $perfil->descripcion ?? 'No se ha agregado una descripción.' }}
            </p>
        </div>

        {{-- Botón de regreso --}}
        <div class="bg-gray-100 px-6 py-4 text-right">
            <a href="{{ route('profesor.alumnos') }}"
               class="inline-block w-full md:w-auto px-4 py-2 font-semibold text-white transition-colors duration-300 transform bg-gray-600 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-400 focus:ring-opacity-50">
                ← Volver a la lista de alumnos
            </a>
        </div>
    </div>
</div>

{{-- Font Awesome para íconos sociales --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
@endsection