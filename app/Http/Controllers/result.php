<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class result extends Controller
{
    public function result (Request $request) {
        return view('result');
    }

    public function result1 () {
        return view('result1');
    }

}
