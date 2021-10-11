<?php


namespace Payment\Models\Payment\Domestic;



class SpDomesticPayment
{
    public  string $amount;
    public  string $description;

    function __construct(int $Amount, string $Description)
    {
        $this->amount = $Amount;
        $this->description = $Description;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

}