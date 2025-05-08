<?php

namespace App;

class CreditCardAdapter implements PaymentAdapterInterface
{
    private $creditCard;

    public function __construct(CreditCard $creditCard)
    {
        $this->creditCard = $creditCard;
    }

    public function collectMoney($amount): bool
    {
        $result = $this->creditCard->authorizeTransaction($amount);
        return str_contains($result, "Authorization code:");
    }
}
