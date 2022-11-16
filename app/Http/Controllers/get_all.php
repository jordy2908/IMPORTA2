<?php

namespace App\Http\Controllers;
use PDF;

use Illuminate\Http\Request;
use App\Models\concentrados;
use App\Models\count;
use App\Models\users;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Arr;

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
        $buscador = concentrados::where('proveedor', 'like', '%'.strtoupper($buscarpor).'%')->paginate($this::pag);
        return view('main', compact('buscador', 'buscarpor'));
    }

    public function get_all__(Request $request) {
        //$c = concentrados::all();
        //return view('welcome', compact('c'));
        $buscarpor = $request -> get('buscarpor');
        $buscador = concentrados::where('posicion_arancelaria', 'like', '%'.strtoupper($buscarpor).'%')->paginate($this::pag);
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
        $b = concentrados::where('proveedor', 'like', '%'.$proveedor.'%');
        $r = FacadePdf::loadView('details.details', compact('proveedor'));
        
        return $r -> stream('details.details.pdf');
    }

    public function get_id(){
        $id = count::all();
        return $id;
    }

    public function csv() {
    //Nombre del archivo que generaremos
    $fileName = 'InvTransactionsInterface.csv';
    //Arreglo que contendrá las filas de datos
    $arrayDetalle = Array();

    //Estos son los datos que recibimos del modelo que queremos leer, aquí ustedes cámbienlo por el modelo que necesiten
    $items=users::all();

    //El encabezado que le dice al explorador el tipo de archivo que estamos generando
    $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
        );    

    //recorremos los registros y con ellos llenamos nuestro arreglo arrayDetall
    foreach ($items as $item){

        $arrayDetalle[] = array('Name' => $item->name,
                        'Email'  => $item->email,
                        'Buscador'  => $item->busqueda
                        );
    }

    //construyamos un arreglo para la información de las columnas
    $columns = array('Name',
                    'Email',
                    'Buscador');
    
        $callback = function() use($arrayDetalle, $columns) {
            $file = fopen('php://output', 'w');
            //si no quieren que el csv muestre el titulo de columnas omitan la siguiente línea.
            fputcsv($file, $columns);
                    foreach ($arrayDetalle as $item) {
                        fputcsv($file, $item);
                    }
                    fclose($file);
                };
        
        //Esto hace que Laravel exponga el archivo como descarga
        return response()->stream($callback, 200, $headers);            

    }
};