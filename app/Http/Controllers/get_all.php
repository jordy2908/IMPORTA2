<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
 

use Illuminate\Http\Request;
use App\Models\concentrados;

use function Ramsey\Uuid\v1;

class get_all extends Controller
{
    const pag = 10000;


    public function index() {
        return view('auth.login1');
    }


    public function get_all(Request $request) {
        //$c = concentrados::all();
        //return view('welcome', compact('c'));
        $buscador = concentrados::all();
        return view('home', compact('buscador'));
    }

    public function get_all_(Request $request) {
        //$c = concentrados::all();
        //return view('welcome', compact('c'));
        $buscarpor = $request -> get('buscarpor');
        $buscador = concentrados::where('pais_procedencia', 'like', '%'.strtoupper($buscarpor).'%')->paginate($this::pag);
        return view('main', compact('buscador', 'buscarpor'));
    }

    public function get_all__(Request $request) {
        //$c = concentrados::all();
        //return view('welcome', compact('c'));
        $buscarpor = $request -> get('buscarpor');
        $buscador = concentrados::where('pais_procedencia', 'like', '%'.strtoupper($buscarpor).'%')->paginate($this::pag);
        return view('main2', compact('buscador', 'buscarpor'));
    }
    
    public function all_(Request $request) {
        $buscarpor = $request -> get('producto');
        $buscador = concentrados::where('descripcion_despacho', 'like', '%'.strtoupper($buscarpor).'%')->paginate($this::pag);
        return response(json_decode($buscador), 200);
    }

    public function all__() {
        //$c = concentrados::all();
        //return view('welcome', compact('c'));
        $buscador = concentrados::all();
        return response(json_decode($buscador), 200) -> header('content-type', 'application/json');
    }

    public function get(concentrados $proveedor) {
        //$c = concentrados::all();
        //return view('welcome', compact('c'));
        return view('details.details', compact('proveedor'));
    }

    public function get_pdf (concentrados $proveedor ) {
        // $b = concentrados::where('proveedor', 'like', '%'.$proveedor.'%');
        // $r = PDF::loadView('details.details', compact('proveedor'));
        // return $r -> stream('details.details.pdf');
    }
};