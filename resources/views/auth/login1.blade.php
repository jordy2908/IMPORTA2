@extends('welcome')
@section('title', 'INICIA SESION!')
@section('image')
    <img src="img/Logo_ImportaApp.png" alt="">
@endsection
@section('content')
    <div class="container-login">
        <div class="login">
            <div class="header-login">
                <img src="img/Logo_ImportaApp.png" alt="">
            </div>
            <p style="font-size: 20px;">Inicia sesion en tu cuenta</p>
            <div class="body-login">
                <form action="/login" method="POST">
                @csrf
                    <div class="mail">
                        <p>CORREO</p>
                        <input type="email" name="email" id="email" placeholder="Correo">
                    </div>
                    <div class="pass">
                        <p>CONTRASEÑA</p>
                        <input type="password" name="password" id="password" placeholder="Contraseña">
                    </div>
                    @if ($errors->any())
                        <p style="min-width: 50%; max-width: 50%; color: #e5172a" >Credenciales inválidas. Vuelve a intentarlo!</p>
                    @endif
                    <button type="submit">Iniciar sesion</button>
                </form>
            </div>
        </div>
    </div>
@endsection
