<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perfil;

class ProfesorController extends Controller
{
    public function verAlumnos(Request $request)
    {
        // Obtener el término de búsqueda de la URL
        $search = $request->input('search');

        // Consultar los usuarios con el rol de 'alumno' y su perfil
        $alumnosQuery = User::with('perfil')
            ->where('role', 'alumno');
            
        // Si hay un término de búsqueda, aplicamos el filtro
        if ($search) {
            $alumnosQuery->whereHas('perfil', function ($query) use ($search) {
                $query->where('nombre', 'like', "%{$search}%")
                      ->orWhere('apellido', 'like', "%{$search}%")
                      ->orWhere('dni', 'like', "%{$search}%");
            });
        }
            
        // Obtenemos los alumnos paginados
        $alumnos = $alumnosQuery->paginate(10);

        return view('profesor.lista-alumnos', [
            'alumnos' => $alumnos,
            'search' => $search // Pasamos el término de búsqueda a la vista para que el campo no se vacíe
        ]);
    }

    public function verPerfilAlumno($id)
    {
        $perfil = \App\Models\Perfil::with('user')->where('user_id', $id)->firstOrFail();

        return view('profesor.perfil-alumno', compact('perfil'));
    }
}

