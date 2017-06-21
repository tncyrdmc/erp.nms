<?php 

$link = getcwd()."/CompropagoSdk/UnitTest/autoload.php";

require_once $link;

use CompropagoSdk\Factory\Factory;
use CompropagoSdk\Client;

$request = @file_get_contents('php://input');

if(!$resp_webhook = Factory::getInstanceOf('CpOrderInfo', $request)){
    $fp2 = fopen(getcwd()."/CompropagoSdk/exec/log.log", "a"); 
    fputs($fp2, "Invalid Request.");
    fclose($fp2);
    die('');
}

$publickey     = $v1;
$privatekey    = $v2;
$live          = $v3; // si es modo pruebas cambiar por 'false'

if(strlen($request)<=1){
    $fp2 = fopen(getcwd()."/CompropagoSdk/exec/log.log", "a"); 
    fputs($fp2, "No existe Request.");
    fclose($fp2);
    die('No existe Request.');
}

try{
    $client = new Client($publickey, $privatekey, $live );

    $validar = false;
    foreach ($preorders as $value) {
        if($resp_webhook->id == $value[1]){
            $validar = true;
            $id_venta = $value[0];
        }
    }

    if(!$validar){
        $fp2 = fopen(getcwd()."/CompropagoSdk/exec/log.log", "a"); 
        fputs($fp2, "Probando el WebHook?, Recibo no existe.");
        fclose($fp2);
        die('Probando el WebHook?, Recibo no existe.');
    } 

    $fp2 = fopen(getcwd()."/CompropagoSdk/exec/log.log", "a"); 
    fputs($fp2, "[".$id_venta);
    fclose($fp2);

    $estatus = "";

    $response = $client->api->verifyOrder($resp_webhook->id);

    switch ($response->type){
        case 'charge.success':
            $estatus =  "ACT";
            break;
        case 'charge.pending':
            $estatus =  "DES";
            break;
        case 'charge.declined':
            $estatus =  "DELETE";
            break;
        case 'charge.expired':
            $estatus =  "DELETE";
            break;
        case 'charge.deleted':
            $estatus =  "DELETE";
            break;
        case 'charge.canceled':
            $estatus =  "DELETE";
            break;
        default:
            $fp2 = fopen(getcwd()."/CompropagoSdk/exec/log.log", "a"); 
            fputs($fp2, 'Invalid Response type.');
            fclose($fp2);
            die('Invalid Response type');
    }
}catch (Exception $e) {
    die($e->getMessage());
}