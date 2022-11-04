<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\concentrados;
use App\Models\User;

class AdminController extends Controller
{
    const pag = 10000;
    public function index(Request $request) {
        $buscarpor = $request -> get('buscarpor');
        $buscador = concentrados::where('pais_procedencia', 'like', '%'.strtoupper($buscarpor).'%')-> orwhere('descripcion_despacho', 'like', '%'.strtoupper($buscarpor).'%')-> orwhere('posicion_arancelaria', 'like', '%'.strtoupper($buscarpor).'%')->paginate($this::pag);

        return view('auth.admin', compact('buscador', 'buscarpor'));
    }

    public function all(Request $request) {
        $concentrados = concentrados::all();
        return response(json_decode($concentrados), 200) -> header('content-type', 'text/plain');
    }

    public function users(Request $request) {
        $concentrados = User::all();
        return response(json_decode($concentrados), 200) -> header('content-type', 'text/plain');
    }
}
