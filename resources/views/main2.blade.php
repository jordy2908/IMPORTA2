<div class="table-container" id="table2" style="overflow-x:auto;">
    <table id="tabla">
            <tr>
                <th>DESCRIPCION COMERCIAL</th>
                <th>PARTIDA ARANCELARIA</th>
            </tr>
            @if (auth()->check() && auth() -> user() -> pago == 'PAYPAL' || auth() -> user() -> pago == 'VISA')
                @foreach ($buscador as $c)
                <tr>
                    <td><div class="descripcion">{{$c -> descripcion_despacho}}</div></td>
                    <td class="pago">{{$c -> posicion_arancelaria}}</td> <!-- PAGO -->
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
                </tr>
                @endforeach
            @endif
    </table>
</div>