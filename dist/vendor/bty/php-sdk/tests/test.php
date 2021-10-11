<?php 
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Payment\Client\SpPaymentClient(
    new \Payment\Client\SpPaymentClientOptions('https://dev.tryspare.com',
        'mHzLLIyaKyClbr5WPP8v3mqu1PLHfRqEJfaNkqXt/Og=',
        'deVF3jjcOggbtFJWiRN0M246lBpADD5MVvaowKJlFfg=')
);
/* try {
    $rep = $client->GetDomesticPayment('05815914-83ca-4b0b-9cf2-13f7f353571d');
    print_r($rep);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
} */


/* $list = $client->ListDomesticPayment(0,3)->then(function ($resp) {
    echo $resp->getBody();
}); */

 $rep = $client->CreateDomesticPayment(new \Payment\Models\Payment\Domestic\SpDomesticPayment(
    50, 'Test payment'
));
 print_r($rep);
