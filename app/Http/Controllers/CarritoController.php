<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    
    public function ver()
    {
        $carrito = session('carrito', []);
        return view('productos.carrito', compact('carrito')); // <- Aquí apuntas a producto.carrito
    }

    public function disminuir($id)
    {
        $carrito = session('carrito', []);

        if (isset($carrito[$id])) {
            if ($carrito[$id]['cantidad'] > 1) {
                $carrito[$id]['cantidad'] -= 1;
            } else {
                unset($carrito[$id]); // si ya queda 1, lo quitamos completamente
            }
        }

        session(['carrito' => $carrito]);

        return back()->with('success', 'Producto actualizado.');
    }

    public function eliminar($id)
    {
        $carrito = session('carrito', []);
        unset($carrito[$id]);
        session(['carrito' => $carrito]);

        return back()->with('success', 'Producto eliminado del carrito.');
    }

}
