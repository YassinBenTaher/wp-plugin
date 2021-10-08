<?php


namespace Payment\Models\Payment\Account;

class SpPaymentUserAccount
{
    public SpUserAccount $account;
    public SpUserPaymentBankAccount $bankAccount;

    function __construct(SpUserAccount $Account, SpUserPaymentBankAccount $BankAccount) {
        $this->account = $Account;
        $this->bankAccount = $BankAccount;
    }

    /**
     * @return SpUserAccount
     */
    public function getAccount(): SpUserAccount
    {
        return $this->account;
    }

    /**
     * @param SpUserAccount $account
     */
    public function setAccount(SpUserAccount $account)
    {
        $this->account = $account;
    }

    /**
     * @return SpUserPaymentBankAccount
     */
    public function getBankAccount(): SpUserPaymentBankAccount
    {
        return $this->bankAccount;
    }

    /**
     * @param SpUserPaymentBankAccount $bankAccount
     */
    public function setBankAccount(SpUserPaymentBankAccount $bankAccount): void
    {
        $this->bankAccount = $bankAccount;
    }

}