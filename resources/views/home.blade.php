@extends('welcome')
@section('image')
    <img src="img/Logo_ImportaApp.png" alt="">
@endsection
@section('title', 'HOME')
@section('content')

@if (auth() -> check())
    @if (auth() -> user() -> busqueda == 'proveedor')

            <!-- JS -->
        <script>
            window.addEventListener("load", function(){
                document.getElementById('buscador').addEventListener("keyup", function(){
                    fetch(`/buscador?buscarpor=${document.getElementById("buscador").value}`,{
                        method: 'get'
                    })
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById("table").style.display = "block"
                        document.getElementById("table2").style.display = "none"
                        document.getElementById("table3").style.display = "none"
                        document.getElementById("sorpresa").innerHTML = html
                        document.getElementById("sorpresa").style.display = "block"
                    })
                })
            })
        </script>
    @else
        <script>
            window.addEventListener("load", function(){
                document.getElementById('buscador').addEventListener("keyup", function(){
                    fetch(`/buscador_?buscarpor=${document.getElementById("buscador").value}`,{
                        method: 'get'
                    })
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById("table").style.display = "block"
                        document.getElementById("table2").style.display = "none"
                        document.getElementById("table3").style.display = "none"
                        document.getElementById("sorpresa").innerHTML = html
                        document.getElementById("sorpresa").style.display = "block"
                    })
                })
            })
        </script>
    @endif
@else 
    <script>
        window.addEventListener("load", function(){
                document.getElementById('buscador').addEventListener("keyup", function(){
                fetch(`/buscador?buscarpor=${document.getElementById("buscador").value}`,{
                    method: 'get'
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById("table").style.display = "block"
                    document.getElementById("table2").style.display = "none"
                    document.getElementById("table3").style.display = "none"
                    document.getElementById("sorpresa").innerHTML = html
                    document.getElementById("sorpresa").style.display = "block"
                })
            })
        })


    </script>
@endif
    <script>

        var a = document.getElementById('product');
        var b = document.getElementById('cantidad');
        var c = document.getElementById('resultado');
        var d = []

        window.addEventListener("load", async function(){
            document.getElementById('resultado').addEventListener("click", function(){ 
                //console.log(document.getElementById('product').value)
                fetch(`/alll`,{
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
                        if (data[x].descripcion_despacho === `${document.getElementById('product').value}`)
                        d.push({
                            "pais" : data[x].pais_procedencia, 
                            "proveedor" : data[x].proveedor,
                            "despacho" : data[x].descripcion_despacho, 
                            "cif" : (data[x].cif_u).replace(",", "."),
                            "fob" : (data[x].fob_u).replace(",", "."),
                            "unidades" : (data[x].unidades).replace(",", "."),
                            "seguro" : (data[x].seguro_u).replace(",", ".")
                        })
                        
                    }
                    // VALOR UNITARIO
                    m = (Number.parseFloat(d[0].unidades) / Number.parseFloat(d[0].fob)) * parseFloat(document.getElementById('cantidad').value)

                    // ARANCEL
                    arancel = m * (parseFloat(document.getElementById('arancel').value) / 100);
                    document.getElementById('resultado').value = m + arancel
                    console.log(d[0].pais, d[0].proveedor, d[0].unidades, d[0].cif)
                })
            });
        })

    </script>


    <div class="container-home" id="blur">
        <!-- <div class="divisor">
            <div class="ico">

            </div> -->
            <!-- <div class="browser"> -->
                <div class="container-search">

                @if ( auth() -> user() -> busqueda == 'proveedor' )
                    <form >
                        <input type="text" name="buscarpor" id="buscador" autocomplete="off" placeholder="PROVEEDOR" >
                        <button type="submit" class="button-brow" >
                            <i class="fa fa-search" style="font-size: 20px;"></i>
                        </button>
                    </form>
                @elseif ( auth() -> user() -> busqueda == 'arancel' )
                    <form >
                        <input type="text" name="buscarpor" id="buscador" autocomplete="off" placeholder="POSICION ARANCELARIA" >
                        <button type="submit" class="button-brow" >
                            <i class="fa fa-search" style="font-size: 20px;"></i>
                        </button>
                    </form>
                @else
                    <form style="display: flex; grid-gap: 4px; justify-content: space-evenly; align-items: center; width: 100%;">
                        <div class="data-buscador" style="width: 45%;">
                            <p>Producto</p>
                            <input class="c-cuerpo2" style="width: 100%; text-align: center;" list="products" name="producto" id="product">
                            <datalist id="products">
                                @foreach($buscador as $c)
                                    <option value="{{$c -> descripcion_despacho}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="data-buscador2" style="width: 45%;">
                            <input class="c-cuerpo2" style="width: 100%; text-align: center;" list="pais" name="producto" id="product" placeholder="Pais de procedencia">
                            <datalist id="pais">
                                @foreach($buscador as $c)
                                    <option value="{{$c -> pais_procedencia}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="data-buscador2" style="width: 45%;">
                            <input class="c-cuerpo2" style="width: 100%; text-align: center;" list="cif" name="producto" id="product" placeholder="Precio unitario en origen">
                            <datalist id="cif">
                                @foreach($buscador as $c)
                                    <option value="{{$c -> cif_u}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="data-buscador2" style="width: 45%;">
                            <input class="c-cuerpo2" style="width: 100%; text-align: center;" list="arancel" name="producto" id="product" placeholder="Arancel">
                            <datalist id="arancel">
                                @foreach($buscador as $c)
                                    <option value="{{$c -> posicion_arancelaria}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="data-buscador2" style="width: 45%;">
                            <input class="c-cuerpo2" style="width: 100%; text-align: center;" list="fob" name="producto" id="product" placeholder="Precio unitario en Ecuador">
                            <datalist id="fob">
                                @foreach($buscador as $c)
                                    <option value="{{$c -> fob_u}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="data-buscador2" style="width: 45%;">
                            <input class="c-cuerpo2" style="width: 100%; text-align: center;" list="flete" name="producto" id="product" placeholder="Flete">
                            <datalist id="flete">
                                @foreach($buscador as $c)
                                    <option value="{{$c -> flete_u}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="data-buscador2" style="width: 45%;">
                            <input class="c-cuerpo2" style="width: 100%; text-align: center;" list="proveedor" name="producto" id="product" placeholder="Proveedor">
                            <datalist id="proveedor">
                                @foreach($buscador as $c)
                                    <option value="{{$c -> proveedor}}"></option>
                                @endforeach
                            </datalist>
                        </div>

                    </form>
                @endif
                </div>


                <div class="blur" id="table" style="display: none;">
                    <div id="sorpresa" style="display: none;"></div>

                    @if ( auth() -> check() && auth() -> user() -> busqueda == 'proveedor')
                        @include('main')
                    @elseif ( auth() -> check() && auth() -> user() -> busqueda == 'arancel' )
                        @include('main2')
                    @else
                        @include('main3')
                    @endif
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </div>
    @if ( auth() -> check() )
        @if ( auth() -> user() -> busqueda == 'proveedor')

        @else
            <div class="calculadora" id="calculadora" style="margin-inline: 2%;">
                <div class="c-titulo" style="text-align: center;">
                    <p>PRE LIQUIDACIÓN DE IMPUESTOS</p>
                </div>
                <div class="c-cuerpo" style="display: flex; flex-direction: row; width: 100%;">
                    <div class="c-cuerpo1" style="width: 100%; text-align: center;">
                        <p>Productos</p>
                        <input class="c-cuerpo2" style="width: 100%; text-align: center;" list="products" name="producto" id="product">
                        <datalist id="products">
                            @foreach($buscador as $c)
                                <option value="{{$c -> descripcion_despacho}}"></option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="c-cuerpo2" style="width: 100%; text-align: center;">
                        <p>Cantidad</p>
                        <input class="c-cuerpo2" style="width: 100%; text-align: center;" type="number" name="cantidad" id="cantidad">
                    </div>
                    <div class="c-arancel" style="width: 100%; text-align: center;">
                    <p>% Arancel</p>
                        <input class="c-cuerpo2" style="width: 100%; text-align: center;" type="text" name="arancel" id="arancel">
                    </div>
                    <div class="c-resultado" style="width: 100%; text-align: center;">
                    <p>Total</p>
                        <input class="c-cuerpo2" style="width: 100%; text-align: center;" type="text" name="resultado" id="resultado">
                    </div>
                    <div class="ico" id="ico" >
                        <i class= "fi fi-br-plus"></i>
                    </div>
                </div>
            </div>

        @endif
    @else
    @endif

@endsection
