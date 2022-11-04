<div class="table-container" id="table2" style="overflow-x:auto;">
    <table id="tabla">
            <tr>
                <!-- <th>RUC</th>  ADMIN/SUPERADMIN -->
                <!-- <th>RAZON SOCIAL</th>  ADMIN/SUPERADMIN -->
                <!-- <th>REFERENDO</th> -->
                <th>PROVEEDOR</th>
                <th>PAIS DE ORIGEN</th>
                <th>DESCRIPCION COMERCIAL</th>
                <!-- <th>PAIS DE PROCEDENCIA</th>  --> 
                <!-- <th>KGS NETO</th> -->
                <!-- <th>CIF</th> -->
                <th>PRESENTACION / SKU</th>
                <th>PARTIDA ARANCELARIA</th>
                <th>PRECIO UNITARIO EN ORIGEN</th>
                <th>PRECIO UNITARIO EN ECUADOR</th>
                <th>UNIDADES</th>
                <!-- <th>FOB</th> -->
                <!-- <th>FLETE</th>  -->
                <!-- <th>SEGURO</th> -->
                <!-- <th>FECHA DE DESPACHO</th> -->
                <!-- <th>FECHA DE EMBARQUE</th>
                <th>FECHA DE LLEGADA</th>
                <th>MANIFIESTO</th> 
                <th>DOCUMENTO DE TRANSPORTE</th>-->
                <!-- <th>PROVEEDOR</th> -->
            </tr>
            @if (auth() -> check())
                @if (auth() -> user() -> pago == 'PAYPAL' || auth() -> user() -> pago == 'VISA')
                    @foreach ($buscador as $c)
                    <tr>
                        <!-- <td> {{ $c -> ruc }} </td>
                        <td>{{$c -> razon_social}}</td>
                        <td>{{$c -> referendo}}</td>-->
                        <td name='ruc' class="pago"> <a href="{{ route('home.get', $c -> id) }}">{{$c -> proveedor}}</a> </td> <!-- PAGO -->
                        <td id="arancel">{{$c -> pais_procedencia}}</td>
                        <td><div class="descripcion">{{$c -> descripcion_despacho}}</div></td>
                        <!-- <td>{{$c -> pais_procedencia}}</td>
                        <td>{{$c -> kgs_neto}}</td>
                        <td>{{$c -> cif_u}} $</td> -->
                        <td>{{$c -> tipo_unidades}}</td>
                        <td class="pago">{{$c -> posicion_arancelaria}}</td> <!-- PAGO -->
                        <td>{{$c -> cif_u}}</td>
                        <td class="pago">{{$c -> fob_u}}</td>
                        <td>{{$c -> unidades}}</td>                                    
                        <!-- <td><div class="descripcion">{{$c -> empresa_transporte}}</div></td> -->
                        <!-- <td>{{$c -> fob_u}} $</td>
                        <td>{{$c -> flete_u}} $</td>
                        <td>{{$c -> seguro_u}} $</td>
                        <td>{{$c -> fecha_despacho}}</td>
                        <td>{{$c -> fecha_embarque}}</td>
                        <td>{{$c -> fecha_llegada}}</td>
                        <td>{{$c -> manifiesto}}</td>
                        <td>{{$c -> doc_transporte}}</td> -->
                        <td>
                            <a href="{{ route('home.pdf', $c -> id) }}">
                                <img class = "pdf" style="min-width: 50px;" src="img/pdf.png" ></img>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    @foreach ($buscador as $c)
                    <tr>
                        <!-- <td> {{ $c -> ruc }} </td>
                        <td>{{$c -> razon_social}}</td>
                        <td>{{$c -> referendo}}</td>-->
                        <td class="pago">XXX.XX.XX.XX</td> <!-- PAGO -->
                        <td id="arancel">{{$c -> pais_procedencia}}</td>
                        <td><div class="descripcion">{{$c -> descripcion_despacho}}</div></td>
                        <!-- <td>{{$c -> pais_procedencia}}</td>
                        <td>{{$c -> kgs_neto}}</td>
                        <td>{{$c -> cif_u}} $</td> -->
                        <td>{{$c -> tipo_unidades}}</td>
                        <td class="pago">XXX.XX.XX.XX</td> <!-- PAGO -->
                        <td>{{$c -> cif_u}}</td>
                        <td class="pago">XXX.XX.XX.XX</td>
                        <td>XXX.XX.XX.XX</td>                                    
                        <!-- <td><div class="descripcion">{{$c -> empresa_transporte}}</div></td> -->
                        <!-- <td>{{$c -> fob_u}} $</td>
                        <td>{{$c -> flete_u}} $</td>
                        <td>{{$c -> seguro_u}} $</td>
                        <td>{{$c -> fecha_despacho}}</td>
                        <td>{{$c -> fecha_embarque}}</td>
                        <td>{{$c -> fecha_llegada}}</td>
                        <td>{{$c -> manifiesto}}</td>
                        <td>{{$c -> doc_transporte}}</td> -->
                    </tr>
                    @endforeach
                @endif
            @else
                @foreach ($buscador as $c)
                <tr>
                    <!-- <td> {{ $c -> ruc }} </td>
                    <td>{{$c -> razon_social}}</td>
                    <td>{{$c -> referendo}}</td>-->
                    <td class="pago">XXX.XX.XX.XX</td> <!-- PAGO -->
                    <td id="arancel">{{$c -> pais_procedencia}}</td>
                    <td><div class="descripcion">{{$c -> descripcion_despacho}}</div></td>
                    <!-- <td>{{$c -> pais_procedencia}}</td>
                    <td>{{$c -> kgs_neto}}</td>
                    <td>{{$c -> cif_u}} $</td> -->
                    <td>{{$c -> tipo_unidades}}</td>
                    <td class="pago">XXX.XX.XX.XX</td> <!-- PAGO -->
                    <td>{{$c -> cif_u}}</td>
                    <td class="pago">XXX.XX.XX.XX</td>
                    <td>XXX.XX.XX.XX</td>                                    
                    <!-- <td><div class="descripcion">{{$c -> empresa_transporte}}</div></td> -->
                    <!-- <td>{{$c -> fob_u}} $</td>
                    <td>{{$c -> flete_u}} $</td>
                    <td>{{$c -> seguro_u}} $</td>
                    <td>{{$c -> fecha_despacho}}</td>
                    <td>{{$c -> fecha_embarque}}</td>
                    <td>{{$c -> fecha_llegada}}</td>
                    <td>{{$c -> manifiesto}}</td>
                    <td>{{$c -> doc_transporte}}</td> -->
                </tr>
                @endforeach
            @endif
    </table>
</div>