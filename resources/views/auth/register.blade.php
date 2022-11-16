<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" id="form" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nombre / Razon social')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- RUC / CEDULA -->
            <div class="mt-4">
                <x-input-label for="cedula" :value="__('Ruc / C.I')" />

                <x-text-input id="cedula" class="block mt-1 w-full" type="text" name="cedula" :value="old('cedula')" required />

                <x-input-error :messages="$errors->get('cedula')" class="mt-2" />
            </div>

            <!-- METODO DE PAGO -->
            <div class="mt-4 flex flex-col w-full">
                <x-input-label :value="__('METODO DE PAGO')" />
                    <div class="flex space-x-12 justify-center mt-2">
                        <div class="flex items-center mx-8 w-full justify-center ">
                            <x-input-label  :value="__('VISA')" />
                            <input class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 mx-0.5" type="radio" name="pago" value="VISA" required >
                        </div>
                        <div class="flex items-center w-full justify-center">
                            <x-input-label  :value="__('FREE')" />
                            <input class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 mx-0.5" type="radio" name="pago" value="free" required >
                        </div>
                    </div>

                <x-input-error :messages="$errors->get('pago')" class="mt-2" />
            </div>

            <!-- METODO DE BUSQUEDA -->
            <div class="mt-4 flex flex-col w-full">
                <x-input-label :value="__('METODO DE BUSQUEDA')" />
                    <div class="flex space-x-12 justify-center mt-2">
                        <div class="flex flex-col items-center w-full justify-center">
                            <div class="cont-p flex flex-row">
                                <x-input-label :value="__('PROVEEDORES')" />
                                <input class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 mx-0.5" id="val" type="radio" name="busqueda" value="proveedor" required >
                            </div>
                        </div>
                        <div class="flex flex-col items-center w-full justify-center">
                            <div class="cont-p flex flex-row">
                                <x-input-label  :value="__('ARANCELES')" />
                                <input class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 mx-0.5" id="val1" type="radio" name="busqueda" value="arancel" required >
                            </div>

                        </div>
                        <div class="flex items-center w-full justify-center">
                            <x-input-label  :value="__('DATA ESTADÍSTICA')" />
                            <input class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 mx-0.5" type="radio" name="busqueda" value="data" required >
                        </div>
                    </div>
                <x-input-error :messages="$errors->get('pago')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Tienes cuenta? Inicia sesion!') }}
                </a>

                <button type="button" onclick="subir()" class="bg-transparent hover:bg-importa2 text-gray-700 font-semibold hover:text-white py-2 px-4 border rounded block ml-2 text-sm dark:text-gray-300 mx-0.5">
                    {{ __('Registrate!') }}
                </button>
            </div>
        </form>

        <script src="https://pay.payphonetodoesposible.com/api/button/js?appId=RtPyukZOe0GW2HRxcQScCw"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script>

            let d = [];

            window.addEventListener("load", async function(){
                            //console.log(document.getElementById('product').value)
                            fetch(`/id`,{
                                method: 'get',
                                headers: {
                                    headers: {
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json',
                                        "Access-Control-Allow-Origin" : "*", 
                                        "Access-Control-Allow-Credentials" : true 
                                }}
                            })
                            .then(response => response.json())
                            .then(data => {
                                for (var x = 0; x < data.length; x++) {
                                    d.push(
                                        (data[x].id_pagos).toString(), 
                                        (data[x].ig_pagos2).toString(),
                                    )
                                    d.toString()
                                    console.log(d)
                                }
                            })
                        })
                    


            // PAGO POR REDIRECCION
            function producto1() {
                var parametros = {
                    amount: "100",
                    amountWithoutTax: "100",
                    clientTransactionID: d[0],
                    responseUrl: "http://127.0.0.1:8000/result",
                    cancellationUrl: "http://127.0.0.1:8000/register",
                };
                $.ajax({
                    data: parametros,
                    url: 'https://pay.payphonetodoesposible.com/api/button/Prepare',
                    type: 'POST',
                    beforeSend:function(xhr) {
                        xhr.setRequestHeader('Authorization', "Bearer 90ll7txoy6pA65moGmtuXay_gu-pzEESZOSjoG_JALLEil48y4bnUN4eWCycrGvGFBC5a50RS-of3rkBJnlF7_Zw96xqtZB8-ueON1YTONiL5F2p2g0VZblsr0aDa5LExlLT5luitbW4YooDjU_XL6iqb1kCG-W5YnBY7bvpnvcTRVGQ_IaimMATkIOg3z_Y59V4Yw5OCRVpFywIb1eGnvHcMHk3IReHUwmB7cDd42KywO6ZVJujDBJE1FNWS42m2pZ1oyYpLv3h6g97PVF-NJvGs_Uf34Oqc1scyuNu5BDAUC0RidrIuHfnCg99T9SdAzRFXQ")
                    },
                    success: function solicitarpago(respuesta) {
                        document.getElementById("form").submit();
                        setTimeout(() => {
                            location.href = respuesta.payWithCard;
                        }, 1000)
                    }, error: function(respuesta) {
                        alert("Error en la llamada: " + respuesta)
                    }
                });
            }

            function producto2() {

                var parametros = {
                    amount: "200",
                    amountWithoutTax: "200",
                    clientTransactionID: d[1],
                    responseUrl: "http://127.0.0.1:8000/result",
                    cancellationUrl: "http://127.0.0.1:8000/register"
                };
                $.ajax({
                    data: parametros,
                    url: 'https://pay.payphonetodoesposible.com/api/button/Prepare',
                    type: 'POST',
                    beforeSend:function(xhr) {
                        xhr.setRequestHeader('Authorization', "Bearer 90ll7txoy6pA65moGmtuXay_gu-pzEESZOSjoG_JALLEil48y4bnUN4eWCycrGvGFBC5a50RS-of3rkBJnlF7_Zw96xqtZB8-ueON1YTONiL5F2p2g0VZblsr0aDa5LExlLT5luitbW4YooDjU_XL6iqb1kCG-W5YnBY7bvpnvcTRVGQ_IaimMATkIOg3z_Y59V4Yw5OCRVpFywIb1eGnvHcMHk3IReHUwmB7cDd42KywO6ZVJujDBJE1FNWS42m2pZ1oyYpLv3h6g97PVF-NJvGs_Uf34Oqc1scyuNu5BDAUC0RidrIuHfnCg99T9SdAzRFXQ")
                    },
                    success: function solicitarpago(respuesta) {
                        document.getElementById("form").submit();
                        setTimeout(() => {
                            location.href = respuesta.payWithCard;
                        }, 1000)
                        
                    }, error: function(respuesta) {
                        alert("Error en la llamada: " + respuesta)
                    }
                });
            }

            function subir(){

                //aqui haces la llamada a otras funciones o realizas todo lo que quieres
                if (document.getElementById('val').checked){
                    producto1();
                    document.getElementById("form").submit();
                } if (document.getElementById('val1').checked) {
                    producto2();
                } else {
                    document.getElementById("form").submit();
                }
                
            }
//  EXPRESS CHECKOUT
    // window.onload = function() {
    //     payphone.Button({

    //         //token obtenido desde la consola de developer
    //         token: "N2MjW1RDOB6u4B_MM9DMw_XDRwA3ObpvVv4qE8oXM1F1ccSKScwngWJCNo_R6iJGDq2WCwkeNOA2uwlaeVNtfvSyG61IHebAoG92RQWCF4dWZ_DLvvDAPw9HkL6K2b4Vez465aOfP9u-y8UkWyCoF6ePquiIPXcc6jBWETk53t7Zm6MdtQa3APH3uV9cbOGi5tHqkGOWz4dA49ttCXjvm1i6tpuX4DdZU89v0IR9Iv4qBfv50G_Dwgbl1K9Z7jIBWdMdZ_MMA3YkdeBjzf7xflg9rXFDwwp8MUgmGuQJsfK99rK4Jt-NEFYrcmJMr8-xVim72A",

    //         //PARÁMETROS DE CONFIGURACIÓN
    //         btnHorizontal: true,
    //         btnCard: true,

    //         createOrder: function(actions){

    //             //Se ingresan los datos de la transaccion ej. monto, impuestos, etc
    //             return actions.prepare({

    //             amount: 100,
    //             amountWithoutTax: 100,
    //             currency: "USD",
    //             clientTransactionId: "001"
    //             });

    //         },
    //     onComplete: function(model, actions){

    //     //Se confirma el pago realizado
    //         actions.confirm({
    //         id: model.id,
    //         clientTxId: model.clientTxId
    //         }).then(function(value){

    //         //EN ESTA SECCIÓN SE RECIBE LA RESPUESTA Y SE MUESTRA AL USUARIO

    //         if (value.transactionStatus == "Approved"){
    //             alert("Pago " + value.transactionId + " recibido, estado " + value.transactionStatus );
    //         }
    //         }).catch(function(err){
    //             console.log(err);
    //         });

    //     }
    //     }).render("#pp-button");

    // }
</script>


    </x-auth-card>
</x-guest-layout>
