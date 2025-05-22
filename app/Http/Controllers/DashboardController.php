<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Orden;
use App\Models\Mensaje;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'totalProductos' => Producto::count(),
            'totalUsuarios' => User::count(),
            'totalCategorias' => Categoria::count(),
            'totalOrdenes' => Orden::count(),
            'totalMensajes' => Mensaje::count(),
        ]);
    }

    //PRODUCTOS
    public function productos()
    {
        $productos = \App\Models\Producto::with('categoria')->get();
        return view('dashboard.productos.index', compact('productos'));
    }

    public function crearProducto()
    {
        $categorias = \App\Models\Categoria::all();
        return view('dashboard.productos.crear', compact('categorias'));
    }

    public function guardarProducto(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'descripcion' => 'nullable|string|max:1000',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $rutaImagen = $request->file('imagen')?->store('productos', 'public');

        \App\Models\Producto::create([
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria_id,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
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
            'descripcion' => 'nullable|string|max:1000',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            if ($producto->imagen && file_exists(public_path($producto->imagen))) {
                unlink(public_path($producto->imagen));
            }
            $rutaImagen = $request->file('imagen')->store('productos', 'public');
            $producto->imagen = 'storage/' . $rutaImagen;
        }

        $producto->update([
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria_id,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
        ]);

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

    //USUARIOS
    public function usuarios()
    {
        $usuarios = User::all();
        return view('dashboard.usuarios', compact('usuarios'));
    }

    public function actualizarRol(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,cliente',
        ]);

        if (Auth::id() == $id) {
            return back()->with('error', 'No puedes cambiar tu propio rol.');
        }

        $usuario = User::findOrFail($id);
        $usuario->role = $request->role;
        $usuario->save();   

        return back()->with('success', 'Rol actualizado correctamente.');
    }


    //ORDENES
    public function ordenes()
    {
        $ordenes = Orden::with('user')->latest()->get();
        return view('dashboard.orden', compact('ordenes'));
    }

    //CATEGORIAS
    public function categorias()
    {
        $categorias = Categoria::all();
        return view('dashboard.categorias.index', compact('categorias'));
    }

    public function crearCategoria()
    {
        return view('dashboard.categorias.crear');
    }

    public function guardarCategoria(Request $request)
    {
        $request->validate(['nombre' => 'required']);
        Categoria::create($request->only('nombre'));
        return redirect()->route('dashboard.categorias')->with('success', 'Categoría creada.');
    }

    public function editarCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('dashboard.categorias.editar', compact('categoria'));
    }

    public function actualizarCategoria(Request $request, $id)
    {
        $request->validate(['nombre' => 'required']);
        Categoria::findOrFail($id)->update($request->only('nombre'));
        return redirect()->route('dashboard.categorias')->with('success', 'Categoría actualizada.');
    }

    public function eliminarCategoria($id)
    {
        Categoria::findOrFail($id)->delete();
        return redirect()->route('dashboard.categorias')->with('success', 'Categoría eliminada.');
    }
}