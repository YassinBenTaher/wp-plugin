<?php


namespace Payment\Client;

class SpEndPoints
{
    public string $value;
    function __construct(string $Value) {
        $this->value = $Value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

 /*   public static $CreateDomesticPayment = '/api/v1.0/payments/domestic/Create';
    public static $GetDomesticPayment = '/api/v1.0/payments/domestic/Get';
    public static $ListDomesticPayment = '/api/v1.0/payments/domestic/List'; */
}