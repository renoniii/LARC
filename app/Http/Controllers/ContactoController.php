<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje; // ¡Importa el modelo!

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function enviar(Request $request)
    {
        // Validar los campos
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required'
        ]);

        // Guardar en la base de datos
        Mensaje::create([
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('correo'),
            'mensaje' => $request->input('mensaje'),
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
    }

    public function verMensajes()
    {
        $mensajes = Mensaje::latest()->get();
        return view('dashboard.mensajes', compact('mensajes'));
    }
}