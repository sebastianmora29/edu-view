<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfiles';

    protected $fillable = [
        'user_id',
        'nombre',
        'apellido',
        'dni',
        'carrera',
        'comision',
        'descripcion',
        'telefono',
        'linkedin',
        'github',
        'foto',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
