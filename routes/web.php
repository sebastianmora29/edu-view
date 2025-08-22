<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProfesorController;


Route::get('/', function () {
   return view('home');
})->name('home');

// Login
Route::get('login', [SessionsController::class, 'showLoginForm'])->name('login');
Route::post('login', [SessionsController::class, 'login']);

// Registro
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Logout
Route::post('logout', [SessionsController::class, 'logout'])->middleware('auth')->name('logout');

// Grupo de rutas para alumnos (con auth y rol)
Route::middleware(['auth', 'verificar.rol:alumno'])->group(function () {


    Route::middleware(['auth', 'verificar.rol:alumno'])->get('/alumno/dashboard', function () {
    return view('alumno.dashboard');
})->name('alumno.dashboard');

    // Crear perfil (formulario)
    Route::get('/perfil', function () {
        return view('alumno.perfil');
    })->name('perfil.create');

    // Guardar perfil
    Route::post('/perfil', [PerfilController::class, 'store'])->name('perfil.store');

    // Ver perfil (mi perfil)

Route::get('/mi-perfil', [PerfilController::class, 'show'])->name('perfil.show');

    // Editar perfil
    Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::put('/perfil/actualizar', [PerfilController::class, 'update'])->name('perfil.update');
});

// Grupo de rutas para profesores
Route::middleware(['auth', 'verificar.rol:profesor'])->group(function () {

    // Dashboard del profesor
    Route::get('/profesor/dashboard', function () {
        return view('profesor.dashboard');
    })->name('profesor.dashboard');


    // Lista de alumnos
    Route::get('/profesor/alumnos', [ProfesorController::class, 'verAlumnos'])->name('profesor.alumnos');

    // Ver perfil de alumno individual
    Route::get('/profesor/alumnos/{id}', [ProfesorController::class, 'verPerfilAlumno'])->name('profesor.alumno.perfil');
});


