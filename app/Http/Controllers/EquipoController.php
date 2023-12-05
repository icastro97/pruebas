<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\ImagenEquipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipoController extends Controller
{
    public function create()
    {
        return view('equipos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validar imágenes
        ]);

        $equipo = Equipo::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);

        // Subir imágenes
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $ruta = $imagen->store('equipos');
                ImagenEquipo::create([
                    'nombre' => $imagen->getClientOriginalName(),
                    'ruta' => $ruta,
                    'equipo_id' => $equipo->id,
                ]);
            }
        }

        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente');
    }

    public function show(Equipo $equipo)
    {
        return view('equipos.show', compact('equipo'));
    }

    public function addImages(Equipo $equipo)
    {
        return view('equipos.add-images', compact('equipo'));
    }

    public function storeImages(Request $request, Equipo $equipo)
    {
        $request->validate([
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validar imágenes
        ]);

        // Subir imágenes
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $ruta = $imagen->store('equipos');
                ImagenEquipo::create([
                    'nombre' => $imagen->getClientOriginalName(),
                    'ruta' => $ruta,
                    'equipo_id' => $equipo->id,
                ]);
            }
        }

        return redirect()->route('equipos.show', $equipo)->with('success', 'Imágenes agregadas correctamente');
    }

    public function destroyImage(ImagenEquipo $imagen)
    {
        // Eliminar la imagen de almacenamiento
        Storage::delete($imagen->ruta);

        // Eliminar la entrada de la base de datos
        $imagen->delete();

        return redirect()->back()->with('success', 'Imagen eliminada correctamente');
    }
}
