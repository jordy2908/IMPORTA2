<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function register() {
        $user = User::create(request(['email', 'name', 'cedula', 'pago', 'busqueda', 'password']));

        auth() -> login($user);
        return redirect() -> to('/home');
    }

}
