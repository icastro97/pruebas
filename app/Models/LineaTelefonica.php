<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaTelefonica extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'asignada'];

    // Relación muchos a uno con Usuario (una línea telefónica pertenece a un usuario)
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
