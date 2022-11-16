<?php
//Obtener parametros de la URL enviados por PayPhone
$transaccion = $_GET["id"];
$client = $_GET["clientTransactionId"];

//Preparar JSON de llamada
$data_array = array(
"id"=> (int)$transaccion,
"clientTxId"=>$client );

$data = json_encode($data_array);

//Iniciar Llamada
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://pay.payphonetodoesposible.com/api/button/V2/Confirm");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt_array($curl, array(
CURLOPT_HTTPHEADER => array(
"Authorization: Bearer 8_GtXlQNsbiKxAujIgWfHBMQhOEYn7kcMvH3ZEDpgndlBOeXzmSTG_2ebiL4NQD99JUOKBHKHKiw-XaHB2uNhKiJAJOSle45Xw26mU1pHSQP1dVK7ysCymIS9rhJr0vWHNFJLxl6ROeXPzo2KDibosKp29bYLca8BYvMsw81YVhaag-XgDEJMSjtEbGeGSYwM9fqXy_mtIptSvteC9oyKkz6WupvtDl159ZKXxVqGvdBSg-yY6ANEXS_oDJ6SX6j85W6De2QpV_ALYuuFjzVkCKP2t7gtaUYrLlsjmbdMz7Q9gOSCgjfZjd-Cscr9BFTS_eEGg", "Content-Type:application/json"),
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);

//En la variable result obtienes todos los parámetros de respuesta
echo $result;
?>