<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Telefono;
use App\Models\User;

class AsignacionController extends Controller
{
    public function asignarEquipo()
    {
        // Mostrar formulario para asignar equipos
        $equiposDisponibles = Equipo::where('asignado', false)->get();
        $usuarios = User::all();

        return view('asignacion.asignar-equipo', compact('equiposDisponibles', 'usuarios'));
    }

    public function storeEquipo(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'equipo_id' => 'required',
            'usuario_id' => 'required',
        ]);

        // Obtener el equipo seleccionado y el usuario
        $equipo = Equipo::findOrFail($request->equipo_id);
        $usuario = User::findOrFail($request->usuario_id);

        // Asignar el equipo al usuario
        $equipo->usuario_id = $usuario->id;
        $equipo->asignado = true;
        $equipo->save();

        return redirect()->route('asignacion.asignar-equipo')->with('success', 'Equipo asignado con éxito.');
    }

    public function desasignarEquipo(Equipo $equipo)
    {
        // Desasignar un equipo de un usuario
        $equipo->usuario_id = null;
        $equipo->asignado = false;
        $equipo->save();

        return redirect()->route('asignacion.asignar-equipo')->with('success', 'Equipo desasignado con éxito.');
    }

    public function asignarTelefono()
    {
        // Mostrar formulario para asignar teléfonos
        $telefonosDisponibles = Telefono::where('asignado', false)->get();
        $usuarios = User::all();

        return view('asignacion.asignar-telefono', compact('telefonosDisponibles', 'usuarios'));
    }

    public function storeTelefono(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'telefono_id' => 'required',
            'usuario_id' => 'required',
        ]);

        // Obtener el teléfono seleccionado y el usuario
        $telefono = Telefono::findOrFail($request->telefono_id);
        $usuario = User::findOrFail($request->usuario_id);

        // Asignar el teléfono al usuario
        $telefono->usuario_id = $usuario->id;
        $telefono->asignado = true;
        $telefono->save();

        return redirect()->route('asignacion.asignar-telefono')->with('success', 'Teléfono asignado con éxito.');
    }

    public function desasignarTelefono(Telefono $telefono)
    {
        // Desasignar un teléfono de un usuario
        $telefono->usuario_id = null;
        $telefono->asignado = false;
        $telefono->save();

        return redirect()->route('asignacion.asignar-telefono')->with('success', 'Teléfono desasignado con éxito.');
    }
}
