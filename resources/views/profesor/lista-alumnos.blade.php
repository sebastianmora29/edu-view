@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
        {{-- Barra superior con buscador y botón de limpiar --}}
        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 p-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-2xl font-bold mb-6 text-teal-700">Alumnos registrados</h3>

            <div class="flex items-center space-x-2">
                <form action="{{ route('profesor.alumnos') }}" method="GET" class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="table-search" name="search"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-teal-500 focus:border-teal-500" 
                        placeholder="Buscar alumno..."
                        value="{{ request('search') }}">
                </form>

                {{-- Botón para limpiar la búsqueda --}}
                @if(request('search'))
                    <a href="{{ route('profesor.alumnos') }}" 
                       class="px-3 py-2 text-sm text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors duration-200">
                        Limpiar
                    </a>
                @endif
            </div>
        </div>

        {{-- Tabla --}}
        <table class="max-w-5xl mx-auto w-full text-sm text-left text-gray-700">
            <thead class="text-base text-gray-600 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3">Foto</th>
                    <th scope="col" class="px-6 py-3">Nombre completo</th>
                    <th scope="col" class="px-6 py-3">DNI</th>
                    <th scope="col" class="px-6 py-3">Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alumnos as $alumno)
                    <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer"
                        onclick="window.location='{{ route('profesor.alumno.perfil', ['id' => $alumno->id]) }}'">
                        
                        {{-- Foto de perfil --}}
                        <td class="px-6 py-4">
                            @if(optional($alumno->perfil)->foto)
                                <img class="w-10 h-10 rounded-full object-cover" 
                                    src="{{ asset('storage/' . $alumno->perfil->foto) }}" 
                                    alt="Foto de {{ optional($alumno->perfil)->nombre }}">
                            @else
                                <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            @endif
                        </td>

                        {{-- Nombre completo --}}
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ optional($alumno->perfil)->nombre }} {{ optional($alumno->perfil)->apellido }}
                        </td>

                        {{-- DNI --}}
                        <td class="px-6 py-4">
                            {{ optional($alumno->perfil)->dni ?? 'Sin datos' }}
                        </td>

                        {{-- Teléfono --}}
                        <td class="px-6 py-4">
                            {{ optional($alumno->perfil)->telefono ?? 'Sin datos' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-6 text-center text-gray-500">No hay alumnos registrados que coincidan con la búsqueda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    <div class="mt-4">
        {{ $alumnos->links() }}
    </div>

    {{-- Botón volver --}}
    <div class="mt-6">
        <a href="{{ route('profesor.dashboard') }}" 
            class="inline-block px-5 py-2 bg-teal-500 text-white rounded hover:bg-teal-700 transition">
            ← Volver a Inicio
        </a>
    </div>
</div>
@endsection