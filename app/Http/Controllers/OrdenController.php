<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Orden;

class OrdenController extends Controller
{
    public function index()
    {
        $ordenes = [];

        if (Auth::check()) {
            $ordenes = Orden::where('user_id', Auth::id())->latest()->get();
        }

        return view('ordenes.index', compact('ordenes'));
    }
}

