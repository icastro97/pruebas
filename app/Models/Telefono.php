<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'asignado'];

    // Relación muchos a uno con Usuario (un teléfono pertenece a un usuario)
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
