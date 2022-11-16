<div class="table-container" id="table2" style="overflow-x:auto;">
    <table id="tabla">
            <tr>
                <th>PAIS DE ORIGEN</th>
                <th>DESCRIPCION COMERCIAL</th>
                <th>PARTIDA ARANCELARIA</th>
                <th>PRECIO UNITARIO EN ORIGEN</th>
                <th>FLETE</th>
                <th>PROVEEDOR</th>
            </tr>
            @if (auth()->check() && auth() -> user() -> pago == 'VISA' && auth() -> user() -> contador > 0)
                @foreach ($buscador as $c)
                <tr>
                    <td class="pago">{{$c -> pais_procedencia}}</td> <!-- PAGO -->
                    <td><div class="descripcion">{{$c -> descripcion_despacho}}</div></td>
                    <td class="pago">{{$c -> posicion_arancelaria}}</td> <!-- PAGO -->
                    <td class="pago">${{$c -> cif_u}}</td> <!-- PAGO -->
                    <td class="pago">${{$c -> flete_u}}</td> <!-- PAGO -->
                    <td class="pago">{{$c -> proveedor}}</td> <!-- PAGO -->
                    <td>
                        <a href="{{ route('home.pdf', $c -> id) }}">
                            <img src="img/pdf.png" ></img>
                        </a>
                    </td>
                </tr>
                @endforeach
            @else
                @foreach ($buscador as $c)
                <tr>
                    <td> <div class="descripcion">{{$c -> descripcion_despacho}}</div> </td> <!-- PAGO -->
                    <td id="arancel">XXX.XX.XX.XX</td>
                    <td class="pago">XXX.XX.XX.XX</td> <!-- PAGO -->
                    <td><div class="descripcion">XXX.XX.XX.XX</div></td>
                    <td class="pago">XXX.XX.XX.XX</td> <!-- PAGO -->
                    <td class="pago">XXX.XX.XX.XX</td> <!-- PAGO -->
                    <td class="pago">XXX.XX.XX.XX</td> <!-- PAGO -->
                    <td class="pago">XXX.XX.XX.XX</td> <!-- PAGO -->
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

                        <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                            <p ><b>Posicion arancelaria:</b></p>
                            <p style="width: 100%;
                                align-items: center;
                                display: flex;
                                justify-content: center;" >{{$c -> posicion_arancelaria}}</p>
                        </div>
                        <details>
                            <summary>Ver mas</summary>

                            <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                                <p ><b>Precio unitario en origen:</b></p>
                                <p style="width: 100%;
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;" >{{$c -> cif_u}}</p>
                            </div>

                            <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                                <p ><b>Flete</b></p>
                                <p style="width: 100%;
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;" >${{$c -> flete_u}}</p>
                            </div>

                            <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                                <p ><b>Proveedor:</b></p>
                                <p style="width: 100%;
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;" >${{$c -> proveedor}}</p>
                            </div>
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
                            justify-content: center;">xxx.xx.xx.xx</p>
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
                                justify-content: center;" > <div class="descripcion"> xxx.xx.xx.xx</div></p>
                        </div>

                        <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                            <p ><b>Posicion arancelaria:</b></p>
                            <p style="width: 100%;
                                align-items: center;
                                display: flex;
                                justify-content: center;" >xxx.xx.xx.xx</p>
                        </div>
                        <details>
                            <summary>Ver mas</summary>

                            <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                                <p ><b>Precio unitario en origen:</b></p>
                                <p style="width: 100%;
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;" >xxx.xx.xx.xx</p>
                            </div>

                            <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                                <p ><b>Flete</b></p>
                                <p style="width: 100%;
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;" >xxx.xx.xx.xx</p>
                            </div>

                            <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                                <p ><b>Proveedor:</b></p>
                                <p style="width: 100%;
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;" >xxx.xx.xx.xx</p>
                            </div>
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
                    justify-content: center;">xxx.xx.xx.xx</p>
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
                        justify-content: center;" > <div class="descripcion"> xxx.xx.xx.xx</div></p>
                </div>

                <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                    <p ><b>Posicion arancelaria:</b></p>
                    <p style="width: 100%;
                        align-items: center;
                        display: flex;
                        justify-content: center;" >xxx.xx.xx.xx</p>
                </div>
                <details>
                    <summary>Ver mas</summary>

                    <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                        <p ><b>Precio unitario en origen:</b></p>
                        <p style="width: 100%;
                            align-items: center;
                            display: flex;
                            justify-content: center;" >xxx.xx.xx.xx</p>
                    </div>

                    <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                        <p ><b>Flete</b></p>
                        <p style="width: 100%;
                            align-items: center;
                            display: flex;
                            justify-content: center;" >xxx.xx.xx.xx</p>
                    </div>

                    <div style="display: flex; flex-direction:row; border-bottom: 1px solid aliceblue; padding: 2% 0 2% 0;">
                        <p ><b>Proveedor:</b></p>
                        <p style="width: 100%;
                            align-items: center;
                            display: flex;
                            justify-content: center;" >xxx.xx.xx.xx</p>
                    </div>
                </details>
            </div>
        </div>
        @endforeach
    @endif
</div>
