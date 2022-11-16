<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\count;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cedula'    => ['required', 'string', 'max:255'],
            'pago'      => ['required', 'string', 'max:255'],
            'busqueda'  => ['required', 'string', 'max:255'],
            'password'  => ['required', Password::min(8) ->mixedCase() ->numbers() ->symbols(), 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'cedula'    => $request -> cedula,
            'pago'      => $request -> pago,
            'busqueda'  => $request -> busqueda,
            'password'  => Hash::make($request->password),
        ]);

        $post = count::find(1);
        $post->id_pagos = $post->id_pagos + 1;
        $post->save();        
        
        count::find(1) -> increment("ig_pagos2");


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
