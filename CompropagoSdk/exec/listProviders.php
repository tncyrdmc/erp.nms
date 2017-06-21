<?php

require_once "CompropagoSdk/UnitTest/autoload.php";

use CompropagoSdk\Client;
use CompropagoSdk\Factory\Factory;

$client = new Client(
    $v1,  # publickey
    $v2,  # privatekey
    $v3   # live
);

$providers =  $client->api->listProviders();
