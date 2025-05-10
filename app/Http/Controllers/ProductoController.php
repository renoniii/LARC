<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class ProductoController extends Controller
{
    

public function index()
{
    $categorias = Categoria::with('productos')->get();
    return view('productos.index', compact('categorias'));
}


    // Si más adelante haces detalle de producto:
    // public function show($id) { return view('productos.show', compact('id')); }
}
