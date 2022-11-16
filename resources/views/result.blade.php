<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<link href="/dist/output.css" rel="stylesheet">
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
@vite('resources/css/app.css')
<?php
//Obtener parametros de la URL enviados por PayPhone
use App\Models\concentrados;

$transaccion = $_GET["id"];
$client = $_GET["clientTransactionId"];
?>

<script>
var transaccion = <?php echo $transaccion?>;
var client = <?php echo $client?>;

var parametros = {id:transaccion, clientTxId:client};

$.ajax({
    data:parametros,
    url: 'https://pay.payphonetodoesposible.com/api/button/Confirm',
    type: 'POST',
    beforeSend: function(xhr) {
        xhr.setRequestHeader ("Authorization", "Bearer 90ll7txoy6pA65moGmtuXay_gu-pzEESZOSjoG_JALLEil48y4bnUN4eWCycrGvGFBC5a50RS-of3rkBJnlF7_Zw96xqtZB8-ueON1YTONiL5F2p2g0VZblsr0aDa5LExlLT5luitbW4YooDjU_XL6iqb1kCG-W5YnBY7bvpnvcTRVGQ_IaimMATkIOg3z_Y59V4Yw5OCRVpFywIb1eGnvHcMHk3IReHUwmB7cDd42KywO6ZVJujDBJE1FNWS42m2pZ1oyYpLv3h6g97PVF-NJvGs_Uf34Oqc1scyuNu5BDAUC0RidrIuHfnCg99T9SdAzRFXQ")
    }, 
    success: function Confirmacion (respuesta) {
        document.querySelector('body').innerHTML = "<x-guest-layout><x-auth-card><x-slot name='logo'><a href='/'><x-application-logo class='w-20 h-20 fill-current text-gray-500' /></a></x-slot><div class='mb-4 text-sm text-gray-600'>{{ __('Gracias por registrarte!. Por favor, revisa tu correo y valida tu cuenta entrando al link enviado e iniciando sesion.') }}</div>@if (session('status') == 'verification-link-sent')<div class='mb-4 font-medium text-sm text-green-600'>{{ __('A new verification link has been sent to the email address you provided during registration.') }}</div>@endif<div class='mt-4 flex items-center justify-between'><form method='POST' action='{{ route('verification.send') }}''>@csrf<div><x-primary-button>{{ __('Reenviar correo') }}</x-primary-button></div></form></div></x-auth-card></x-guest-layout>";
    }, error: function(respuesta) {
        alert("Error: "+ respuesta)
    }
});
</script>