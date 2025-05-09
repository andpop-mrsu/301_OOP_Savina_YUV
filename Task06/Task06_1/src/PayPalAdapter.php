<?php

namespace App;

class PayPalAdapter implements PaymentAdapterInterface
{
    private $paypal;

    public function __construct(PayPal $paypal)
    {
        $this->paypal = $paypal;
    }

    public function collectMoney($amount): bool
    {
        $result = $this->paypal->transfer('store@example.com', $amount);
        return $result === "Paypal Success!";
    }
}
