<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\count;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function register() {
        $user = User::create(request(['email', 'name', 'cedula', 'pago', 'busqueda', 'password']));        

        auth() -> login($user);

        $post = count::find(1);
        $post->id_pagos = $post->id_pagos + 1;
        $post->save();        
        
        count::find(1) -> increment("ig_pagos2");

        return redirect() -> to('/home');
    }

}
