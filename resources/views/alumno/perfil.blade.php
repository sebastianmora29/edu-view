@extends('layouts.app')

@section('title', 'Completar Perfil')

@section('content')

<div class="w-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-md p-6">
    {{-- Logo --}}
    <div class="flex justify-center mb-6">
        <img class="w-auto h-16" src="{{ asset('images/utn_logo.jpg') }}" alt="Logo">
    </div>

    <h3 class="text-xl font-bold text-center text-gray-700 mb-2">
        Completa tu perfil
    </h3>
    <p class="text-center text-gray-600 text-sm mb-6">
        Ingresa tus datos para que tu perfil quede completo
    </p>

    <form action="{{ route('perfil.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        {{-- Columna Izquierda --}}
        <div class="space-y-4">
            {{-- Nombre --}}
            <div>
                <label for="nombre" class="block text-gray-700 text-sm font-bold mb-1">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" required
                    class="block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg 
                           focus:border-teal-400 focus:ring focus:ring-teal-300 focus:ring-opacity-40 focus:outline-none">
            </div>

            {{-- Apellido --}}
            <div>
                <label for="apellido" class="block text-gray-700 text-sm font-bold mb-1">Apellido</label>
                <input type="text" id="apellido" name="apellido" placeholder="Apellido" required
                    class="block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg 
                           focus:border-teal-400 focus:ring focus:ring-teal-300 focus:ring-opacity-40 focus:outline-none">
            </div>

{{-- DNI --}}
<div>
    <label for="dni" class="block text-gray-700 text-sm font-bold mb-1">DNI</label>
    <input type="text" id="dni" name="dni" placeholder="DNI" required
        value="{{ old('dni') }}"
        class="block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg 
               focus:border-teal-400 focus:ring focus:ring-teal-300 focus:ring-opacity-40 focus:outline-none">

    @error('dni')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


            {{-- Carrera --}}
            <div>
                <label for="carrera" class="block text-gray-700 text-sm font-bold mb-1">Carrera</label>
                <input type="text" id="carrera" name="carrera" placeholder="Carrera" required
                    class="block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg 
                           focus:border-teal-400 focus:ring focus:ring-teal-300 focus:ring-opacity-40 focus:outline-none">
            </div>

            {{-- Comisión --}}
            <div>
                <label for="comision" class="block text-gray-700 text-sm font-bold mb-1">Comisión</label>
                <input type="text" id="comision" name="comision" placeholder="Comisión"
                    class="block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg 
                           focus:border-teal-400 focus:ring focus:ring-300 focus:ring-opacity-40 focus:outline-none">
            </div>

            {{-- Descripción --}}
            <div>
                <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-1">Descripción</label>
                <textarea id="descripcion" name="descripcion" placeholder="Descripción"
                    class="block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg 
                           focus:border-teal-400 focus:ring focus:ring-teal-300 focus:ring-opacity-40 focus:outline-none"></textarea>
            </div>
        </div>

        {{-- Columna Derecha --}}
        <div class="space-y-4">
            {{-- WhatsApp --}}
            <div>
                <label for="telefono" class="block text-gray-700 text-sm font-bold mb-1">WhatsApp</label>
                <div class="flex items-center">
                    <span class="mr-2 text-green-500"><i class="fab fa-whatsapp"></i></span>
                    <input type="text" id="telefono" name="telefono" placeholder="WhatsApp"
                        class="flex-1 block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg 
                                focus:border-teal-400 focus:ring focus:ring-teal-300 focus:ring-opacity-40 focus:outline-none">
                </div>
            </div>

            {{-- LinkedIn --}}
            <div>
                <label for="linkedin" class="block text-gray-700 text-sm font-bold mb-1">LinkedIn</label>
                <div class="flex items-center">
                    <span class="mr-2 text-blue-700"><i class="fab fa-linkedin"></i></span>
                    <input type="url" id="linkedin" name="linkedin" placeholder="LinkedIn"
                        class="flex-1 block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg 
                                focus:border-teal-400 focus:ring focus:ring-teal-300 focus:ring-opacity-40 focus:outline-none">
                </div>
            </div>

            {{-- GitHub --}}
            <div>
                <label for="github" class="block text-gray-700 text-sm font-bold mb-1">GitHub</label>
                <div class="flex items-center">
                    <span class="mr-2 text-gray-800"><i class="fab fa-github"></i></span>
                    <input type="text" id="github" name="github" placeholder="GitHub"
                        class="flex-1 block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg 
                                focus:border-teal-400 focus:ring focus:ring-teal-300 focus:ring-opacity-40 focus:outline-none">
                </div>
            </div>

            {{-- Dropzone / Foto --}}
            <div class="mt-4">
                <label class="block font-semibold text-gray-700 mb-2">Foto de perfil</label>
                <div id="dropzone-container" class="relative w-48 h-48 rounded-full overflow-hidden border-2 border-dashed border-gray-300 cursor-pointer mx-auto">
                    <input id="dropzone-perfil" type="file" name="foto" class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                    
                    {{-- Placeholder --}}
                    <div id="placeholder" class="absolute inset-0 flex flex-col items-center justify-center text-center bg-gray-50 hover:bg-gray-100 transition">
                        <svg class="w-8 h-8 mb-2 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="text-xs text-gray-500">Subí una foto</p>
                    </div>
                    
                    {{-- Vista previa de la imagen --}}
                    <img id="foto-preview" src="#" alt="Vista previa de la foto" class="hidden absolute inset-0 w-full h-full object-cover" />
                </div>
            </div>
        </div>

        {{-- Botón Guardar full width --}}
        <div class="md:col-span-2 mt-4">
            <button type="submit"
                class="w-full px-4 py-2 font-semibold text-white transition-colors duration-300 transform bg-teal-500 rounded-lg hover:bg-teal-400 focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-50">
                Guardar Perfil
            </button>
        </div>
    </form>
</div>

<script>
    const inputFile = document.getElementById('dropzone-perfil');
    const previewImg = document.getElementById('foto-preview');
    const placeholder = document.getElementById('placeholder');
    const dropzoneContainer = document.getElementById('dropzone-container');

    // Muestra la vista previa cuando se selecciona una imagen
    inputFile.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });

    // Permite hacer clic en la vista previa para cambiar la imagen
    dropzoneContainer.addEventListener('click', function() {
        inputFile.click();
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

@endsection