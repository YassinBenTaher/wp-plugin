<?php


namespace Payment\Models\Payment\Account;


class SpUserPaymentBankAccount
{
    public string $schema;
    public string $identification;

    function __construct(string $Schema, string $Identification) {
        $this->schema = $Schema;
        $this->identification = $Identification;
    }

    /**
     * @return string
     */
    public function getSchema(): string
    {
        return $this->schema;
    }

    /**
     * @param string $schema
     */
    public function setSchema(string $schema): void
    {
        $this->schema = $schema;
    }

    /**
     * @return string
     */
    public function getIdentification(): string
    {
        return $this->identification;
    }

    /**
     * @param string $identification
     */
    public function setIdentification(string $identification): void
    {
        $this->identification = $identification;
    }

}