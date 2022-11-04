<script>
            window.addEventListener("load", function(){
            document.getElementById('buscador').addEventListener("keyup", function(){
                fetch(`/admin?buscarpor=${document.getElementById("buscador").value}`,{
                    method: 'get'
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById("table-container").innerHTML = html
                    document.getElementById("tabla").style.display = 'block'
                })
            })
        })

</script>


<div class="container-search">
    <form>
        <input type="text" name="buscarpor" id="buscador" value="{{ $buscarpor }}" placeholder="Busca por: Descripción comercial, país, subpartida arancelaria, nombre arancelario"
        style="background: rgb(255, 255, 255, 0);">
        <button type="submit" class="button-brow" >
            <i class="fa fa-search" style="font-size: 20px;"></i>
        </button>
    </form>
</div>


<div class="table-container" style="overflow-x:auto;">
                        <table id="tabla">
                            <tr>
                                <th>RUC</th>
                                <th>RAZON SOCIAL</th>
                                <th>EMBARCADOR</th>
                                <th>AGENTE DE CARGA</th>
                                <th>FLETE</th>
                                <th>FECHA DE DESPACHO</th>
                                <th>FECHA DE EMBARQUE</th>  
                                <th>FECHA DE LLEGADA</th>
                                <th>ADUANA</th>
                                <th>DOCUMENTO DE TRANSPORTE</th>
                                <th>PROVEEDOR</th>
                                <th>PAIS DE ORIGEN</th>
                                <th>DESCRIPCION COMERCIAL</th>
                                <th>PRESENTACION / SKU</th>
                                <th>PARTIDA ARANCELARIA</th>
                                <th>PRECIO UNITARIO DE ORIGEN</th> 
                                <th>PRECIO UNITARIO EN ECUADOR</th>
                                <th>UNIDADES</th>
                            </tr>
                            @foreach ($buscador as $c)
                            <tr>
                                <td> {{ $c -> ruc }} </td>
                                <td>{{$c -> razon_social}}</td>
                                <td>{{$c -> embarcador}}</td>
                                <td class="pago">{{$c -> empresa_transporte}}</td>
                                <td id="arancel">{{$c -> flete_u}}$</td>
                                <td>{{$c -> fecha_despacho}}</td>
                                <td>{{$c -> fecha_embarque}}</td>
                                <td>{{$c -> fecha_llegada}}</td>
                                <td>{{$c -> aduana}}</td>
                                <td>{{$c -> doc_transporte}}</td>
                                <td>{{$c -> proveedor}}</td>
                                <td>{{$c -> pais_procedencia}}</td>
                                <td><div class="descripcion">{{$c -> descripcion_despacho}}</div></td>
                                <td>{{$c -> tipo_unidades}}</td>
                                <td class="pago">{{$c -> posicion_arancelaria}}</td>
                                <td>{{$c -> cif_u}}</td>
                                <td class="pago">{{$c -> fob_u}}</td>
                                <td>{{$c -> unidades}}</td>                                    
                            </tr>
                            @endforeach
                        </table>
                    </div>
