@extends('welcome')
@section('image')
    <img src="img/Logo_ImportaApp.png" alt="">
@endsection
@section('title', 'HOME')
@section('content')

@if (auth() -> check())
    @if (auth() -> user() -> busqueda)

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
                        document.getElementById("sorpresa").innerHTML = html
                        document.getElementById("sorpresa").style.display = "block"
                        document.getElementById("calculadora").style.display = "block"
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
                        document.getElementById("sorpresa").innerHTML = html
                        document.getElementById("sorpresa").style.display = "block"
                        document.getElementById("calculadora").style.display = "block"
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
                    document.getElementById("sorpresa").innerHTML = html
                    document.getElementById("sorpresa").style.display = "block"
                    document.getElementById("calculadora").style.display = "block"
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

        var html = "<table>";
        for(var i=0; i < array.length; i++){
            var row = Object.keys(array[i]);
            html += "<tr>";
             for(var x=0; x < row.length; x++){
                  html += "<td>" + row[x] + "</td>";
             }
            html += "<tr>";
        }
        html += "</table>";
    </script>



    <div class="container-home" id="blur">
        <!-- <div class="divisor">
            <div class="ico">

            </div> -->
            <!-- <div class="browser"> -->
                <div class="container-search">

                    <form >
                        <input type="text" name="buscarpor" id="buscador" autocomplete="off" placeholder="Descripción comercial / país / subpartida arancelaria / nombre arancelario" >
                        <button type="submit" class="button-brow" >
                            <i class="fa fa-search" style="font-size: 20px;"></i>
                        </button>
                    </form>
                </div>


                <div class="blur" id="table" style="display: none;">
                <div class="table-container" style="overflow-x:auto;">
                    <div id="sorpresa" style="display: none;"></div>

                    @if ( auth() -> check() )
                        @if ( auth() -> user() -> busqueda )
                            @include('main')
                        @else
                            @include('main2')
                        @endif
                    @else
                        @include('main')
                    @endif
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </div>
    @if ( auth() -> check() )
        @if ( auth() -> user() -> busqueda )

        @else
            <div class="calculadora" id="calculadora" style="display: flex; flex-direction: column; width: 70%; height: 20%; display:none; overflow-y: auto;">
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
