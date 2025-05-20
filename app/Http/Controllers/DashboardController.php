<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Mensaje;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'totalProductos' => Producto::count(),
            'totalUsuarios' => User::count(),
            'totalCategorias' => Categoria::count(),
            //'totalMensajes' => Mensaje::count()
        ]);
    }

    public function productos()
    {
        $productos = \App\Models\Producto::with('categoria')->get();
        return view('dashboard.productos', compact('productos'));
    }

    public function guardarProducto(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $rutaImagen = $request->file('imagen')?->store('productos', 'public');

        Producto::create([
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria_id,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'imagen' => $rutaImagen ? 'storage/' . $rutaImagen : null,
        ]);

        return redirect()->route('dashboard.productos')->with('success', 'Producto creado exitosamente.');
    }

    public function editarProducto($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('dashboard.productos.editar', compact('producto', 'categorias'));
    }

    public function actualizarProducto(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            if ($producto->imagen && file_exists(public_path($producto->imagen))) {
                unlink(public_path($producto->imagen));
            }
            $rutaImagen = $request->file('imagen')->store('productos', 'public');
            $producto->imagen = 'storage/' . $rutaImagen;
        }

        $producto->update($request->only('nombre', 'categoria_id', 'precio', 'stock'));

        return redirect()->route('dashboard.productos')->with('success', 'Producto actualizado correctamente.');
    }

    public function eliminarProducto($id)
{
    $producto = \App\Models\Producto::findOrFail($id);

    // Eliminar imagen si existe
    if ($producto->imagen && file_exists(public_path($producto->imagen))) {
        unlink(public_path($producto->imagen));
    }

    $producto->delete();

    return redirect()->route('dashboard.productos')->with('success', 'Producto eliminado correctamente.');
}


    public function usuarios()
    {
        return view('dashboard.usuarios');
    }

    public function mensajes()
    {
        return view('dashboard.mensajes');
    }

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }
}