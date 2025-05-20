<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orden;
use App\Models\Producto;

class CarritoController extends Controller
{
    // Ver carrito
    public function ver()
    {
        $carrito = session('carrito', []);
        return view('productos.carrito', compact('carrito'));
    }

    // Agregar al carrito (antes estaba en ProductoController)
    public function agregar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $cantidad = $request->input('cantidad', 1);

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] += $cantidad;
        } else {
            $carrito[$id] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'imagen' => $producto->imagen,
                'cantidad' => $cantidad,
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto añadido al carrito.');
    }

    // Disminuir cantidad
    public function disminuir($id)
    {
        $carrito = session('carrito', []);

        if (isset($carrito[$id])) {
            if ($carrito[$id]['cantidad'] > 1) {
                $carrito[$id]['cantidad'] -= 1;
            } else {
                unset($carrito[$id]);
            }
        }

        session(['carrito' => $carrito]);

        return back()->with('success', 'Producto actualizado.');
    }

    // Eliminar completamente del carrito
    public function eliminar($id)
    {
        $carrito = session('carrito', []);
        unset($carrito[$id]);
        session(['carrito' => $carrito]);

        return back()->with('success', 'Producto eliminado del carrito.');
    }

    // Ver formulario de checkout
    public function checkout()
    {
        return view('productos.checkout');
    }

    // Procesar compra
    public function procesarCheckout(Request $request)
    {
        $carrito = session('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('productos')->with('error', 'Tu carrito está vacío.');
        }

        $total = array_sum(array_map(fn($i) => $i['precio'] * $i['cantidad'], $carrito));

        Orden::create([
            'user_id'   => Auth::id(),
            'direccion' => $request->input('direccion'),
            'telefono'  => $request->input('telefono'),
            'total'     => $total,
            'productos' => $carrito,
        ]);

        session()->forget('carrito');
        session(['resumen' => $carrito]);

        return view('productos.checkout_confirmacion');
    }
}
