<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create() {
        return view('auth.login1');
    }

    public function login() {
        if (auth() -> attempt(request(['email', 'password'])) == false) {
            return back() -> withErrors([
                'message' => 'Email or password is incorrect. Try again'
            ]);
        } else {
            if (auth() -> user() -> admin == true) {
                return redirect() -> route('admin.index');
            } else {
                return redirect() -> to('/home');
            }
        }
    }

    public function destroy() {
        auth()->logout();

        return redirect() -> to('/');
    }

}
