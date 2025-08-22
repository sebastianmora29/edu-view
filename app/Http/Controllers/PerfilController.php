<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function store(Request $request)
{
    $data = $request->validate([
        'nombre' => 'required|string',
        'apellido' => 'required|string',
        'dni' => 'required|unique:perfiles,dni',
        'carrera' => 'required|string',
        'comision' => 'nullable|string',
        'descripcion' => 'nullable|string',
        'telefono' => 'nullable|string',
        'linkedin' => 'nullable|url',
        'github' => 'nullable|string',
        'foto' => 'nullable|image|max:2048',
    ]);

    // Guardar la imagen
    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('perfiles', 'public');
    }

    $data['user_id'] = Auth::id();

    Perfil::create($data);

    return redirect()->route('perfil.show')->with('success', 'Perfil creado correctamente');
}

public function edit()
{
    $perfil = auth()->user()->perfil;

    if (!$perfil) {
        return redirect()->route('perfil.show')->with('error', 'Primero completá tu perfil.');
    }

    return view('alumno.editar-perfil', compact('perfil'));
}

public function update(Request $request)
{
    $perfil = auth()->user()->perfil;

    $data = $request->validate([
        'nombre' => 'required|string',
        'apellido' => 'required|string',
        'dni' => 'required|string|unique:perfiles,dni,' . $perfil->id,
        'carrera' => 'required|string',
        'comision' => 'nullable|string',
        'descripcion' => 'nullable|string',
        'telefono' => 'nullable|string',
        'linkedin' => 'nullable|url',
        'github' => 'nullable|string',
        'foto' => 'nullable|image|max:2048',
    ]);

    // Eliminar foto si se tildó el checkbox
    if ($request->filled('eliminar_foto') && $perfil->foto) {
        Storage::disk('public')->delete($perfil->foto);
        $data['foto'] = null;
    }

    // Subir nueva foto y eliminar la anterior
    if ($request->hasFile('foto')) {
        if ($perfil->foto) {
            Storage::disk('public')->delete($perfil->foto);
        }
        $data['foto'] = $request->file('foto')->store('perfiles', 'public');
    }

    $perfil->update($data);

    return redirect()->route('perfil.show')->with('success', 'Perfil actualizado correctamente.');
}
// En tu archivo PerfilController.php

public function show()
{
    // Lógica que estaba en tu archivo de rutas
    $perfil = auth()->user()->perfil;

    if (!$perfil) {
        return redirect()->route('perfil.create')->with('error', 'Primero completá tu perfil.');
    }

    return view('alumno.mi-perfil', compact('perfil'));
}
}
