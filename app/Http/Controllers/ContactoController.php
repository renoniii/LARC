<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function enviar(Request $request)
    {
        // Aquí podrías validar y enviar correo o guardar mensaje en DB
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required'
        ]);

        // Por ahora solo redireccionamos con mensaje
        return back()->with('success', 'Mensaje enviado correctamente.');
    }
}
