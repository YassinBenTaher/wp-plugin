<?php


namespace Payment\Client;


use Http\Promise\Promise;

interface ISpPaymentClient
{
    /**
     * @param SpDomesticPayment $payment
     * @return mixed
     */
    function CreateDomesticPayment(SpDomesticPayment $payment);

    /**
     * @param string $id
     * @return mixed
     */
    function GetDomesticPayment(string $id);

    /**
     * @param int $start
     * @param int $perPage
     * @return mixed
     */
    function ListDomesticPayment(int $start, int $perPage);

}