<?php


namespace Payment\Client;
use GuzzleHttp\Exception\GuzzleException;
use http\Client;
use Payment\Models\Payment\Domestic\SpDomesticPayment;

use Payment\Models\Response\SpareSdkResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

require_once 'vendor/autoload.php';

class SpPaymentClient implements ISpPaymentClient
{

    public SpPaymentClientOptions $clientOptions;

    function __construct(SpPaymentClientOptions $ClientOptions) {
        $this->clientOptions = $ClientOptions;
    }


    /**
     * @throws GuzzleException
     */
    public function CreateDomesticPayment($payment)
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('POST', "{$this->clientOptions->baseUrl}/api/v1.0/payments/domestic/Create" ,
            $this->GetHeaders(), json_encode($payment));
        $response = $serializer->deserialize($client->send($request)->getBody(), SpareSdkResponse::class, 'json');
        return $response->getData();
    }

    /**
     * @throws GuzzleException
     */
    public function GetDomesticPayment(string $id)
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', "{$this->clientOptions->baseUrl}/api/v1.0/payments/domestic/Get?id=$id" , $this->GetHeaders());

        $response = $serializer->deserialize($client->send($request)->getBody(), SpareSdkResponse::class, 'json');
        return $response->getData();
    }

    /**
     * @throws GuzzleException
     */
    public function ListDomesticPayment(int $start, int $perPage)
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', "{$this->clientOptions->baseUrl}/api/v1.0/payments/domestic/List?start=$start&perPage=$perPage" , $this->GetHeaders());
        $response = $serializer->deserialize($client->send($request)->getBody(), SpareSdkResponse::class, 'json');
        return $response->getData();
    }

    private function GetHeaders(): array {
        return array('app-id' => $this->clientOptions->appId,
                     'x-api-key' => $this->clientOptions->appKey,
                     'Content-Type' => 'application/json');
}


}