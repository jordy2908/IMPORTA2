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
                @if (auth() -> user() -> pago == 'VISA' && auth() -> user() -> contador > 0)
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

<div class="responsiv" style="overflow-y: auto;" id="table3">
    @if (auth() -> check())
        @if (auth() -> user() -> pago == 'VISA' && auth() -> user() -> contador > 0)
            @foreach ($buscador as $c)
                <div class="info-contenedor" style="display: flex; flex-direction:column;">

                    <div class="titulo-info" style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                        <p ><b>Pais de procedencia: </b></p>
                        <p style="width: 100%;
                            align-items: center;
                            display: flex;
                            justify-content: center;">{{$c -> pais_procedencia}}</p>
                        <a style="width: 20%;" href="{{ route('home.pdf', $c -> id) }}">
                            <img style="min-width: 2rem;" src="img/pdf.png" ></img>
                        </a>

                    </div>
                    <div class="cuerpo-info">
                        <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                            <p ><b>Descripcion comercial:</b></p>
                            <p style="width: 100%;
                                align-items: center;
                                display: flex;
                                justify-content: center;" > <div class="descripcion"> {{$c -> descripcion_despacho}}</div></p>
                        </div>

                        <details>
                            <summary>Ver mas</summary>

                            <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                                <p ><b>Presentacion:</b></p>
                                <p style="width: 100%;
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;" >{{$c -> tipo_unidades}}</p>
                            </div>

                            <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                                <p ><b>Precio unitario en origen:</b></p>
                                <p style="width: 100%;
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;" >${{$c -> cif_u}}</p>
                            </div>

                            <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                                <p ><b>Posicion arancelaria:</b></p>
                                <p style="width: 100%;
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;" >{{$c -> posicion_arancelaria}}</p>
                            </div>
                            <p> <a href="{{ route('home.get', $c -> id) }}"><b>Proveedor:</b> {{$c -> proveedor}}</a> </p>
                            <p class="pago"><b>Precio unitario en Ecuador:</b> ${{$c -> fob_u}}</p>
                            <p> <b>Unidades:</b> ${{$c -> unidades}}</p>  
                        </details>              
                    </div>
                </div>
            @endforeach
        @else
            @foreach ($buscador as $c)
            <div class="info-contenedor" style="display: flex; flex-direction:column;">

                <div class="titulo-info" style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                    <p ><b>Pais de procedencia: </b></p>
                    <p style="width: 100%;
                        align-items: center;
                        display: flex;
                        justify-content: center;">{{$c -> pais_procedencia}}</p>
                </div>
                <div class="cuerpo-info">
                    <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                        <p ><b>Descripcion comercial:</b></p>
                        <p style="width: 100%;
                            align-items: center;
                            display: flex;
                            justify-content: center;" > <div class="descripcion"> {{$c -> descripcion_despacho}}</div></p>
                    </div>

                    <details>
                        <summary>Ver mas</summary>

                        <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                            <p ><b>Presentacion:</b></p>
                            <p style="width: 100%;
                                align-items: center;
                                display: flex;
                                justify-content: center;" >{{$c -> tipo_unidades}}</p>
                        </div>

                        <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                            <p ><b>Precio unitario en origen:</b></p>
                            <p style="width: 100%;
                                align-items: center;
                                display: flex;
                                justify-content: center;" >${{$c -> cif_u}}</p>
                        </div>

                        <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                            <p ><b>Posicion arancelaria:</b></p>
                            <p style="width: 100%;
                                align-items: center;
                                display: flex;
                                justify-content: center;" >xxx.xx.xx.xx</p>
                        </div>
                        <p> <a href="{{ route('home.get', $c -> id) }}"><b>Proveedor:</b> xxx.xx.xx.xx</a> </p>
                        <p class="pago"><b>Precio unitario en Ecuador:</b> xxx.xx.xx.xx</p>
                        <p> <b>Unidades:</b> xxx.xx.xx.xx</p>  
                    </details>              
                </div>
            </div>
            @endforeach
        @endif
    @else
        @foreach ($buscador as $c)
        <div class="info-contenedor" style="display: flex; flex-direction:column;">

            <div class="titulo-info" style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                <p ><b>Pais de procedencia: </b></p>
                <p style="width: 100%;
                    align-items: center;
                    display: flex;
                    justify-content: center;">{{$c -> pais_procedencia}}</p>
            </div>
            <div class="cuerpo-info">
                <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                    <p ><b>Descripcion comercial:</b></p>
                    <p style="width: 100%;
                        align-items: center;
                        display: flex;
                        justify-content: center;" > <div class="descripcion"> {{$c -> descripcion_despacho}}</div></p>
                </div>

                <details>
                    <summary>Ver mas</summary>

                    <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                        <p ><b>Presentacion:</b></p>
                        <p style="width: 100%;
                            align-items: center;
                            display: flex;
                            justify-content: center;" >{{$c -> tipo_unidades}}</p>
                    </div>

                    <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                        <p ><b>Precio unitario en origen:</b></p>
                        <p style="width: 100%;
                            align-items: center;
                            display: flex;
                            justify-content: center;" >${{$c -> cif_u}}</p>
                    </div>

                    <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                        <p ><b>Posicion arancelaria:</b></p>
                        <p style="width: 100%;
                            align-items: center;
                            display: flex;
                            justify-content: center;" >xxx.xx.xx.xx</p>
                    </div>
                    <p> <a href="{{ route('home.get', $c -> id) }}"><b>Proveedor:</b> xxx.xx.xx.xx</a> </p>
                    <p class="pago"><b>Precio unitario en Ecuador:</b> xxx.xx.xx.xx</p>
                    <p> <b>Unidades:</b> xxx.xx.xx.xx</p>  
                </details>              
            </div>
        </div>
        @endforeach
    @endif
</div>