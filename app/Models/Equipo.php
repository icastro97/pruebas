<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'asignado'];

    // Relación muchos a uno con Usuario (un equipo pertenece a un usuario)
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
