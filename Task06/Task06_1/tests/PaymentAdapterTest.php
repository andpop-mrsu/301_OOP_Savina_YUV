<?php

namespace App\Tests;

use App\PayPalAdapter;
use App\CreditCardAdapter;
use App\PayPal;
use App\CreditCard;
use PHPUnit\Framework\TestCase;

class PaymentAdapterTest extends TestCase
{
    public function testPayPalAdapter_CollectMoney_Success()
    {
        $paypalMock = $this->createMock(PayPal::class);
        $paypalMock->method('transfer')
            ->willReturn('Paypal Success!');

        $adapter = new PayPalAdapter($paypalMock);

        $this->assertTrue($adapter->collectMoney(100));
    }

    public function testPayPalAdapter_CollectMoney_Failure()
    {
        $paypalMock = $this->createMock(PayPal::class);
        $paypalMock->method('transfer')
            ->willReturn('Error');

        $adapter = new PayPalAdapter($paypalMock);

        $this->assertFalse($adapter->collectMoney(100));
    }

    public function testCreditCardAdapter_CollectMoney_Success()
    {
        $creditCardMock = $this->createMock(CreditCard::class);
        $creditCardMock->method('authorizeTransaction')
            ->willReturn('Authorization code: 234da');

        $adapter = new CreditCardAdapter($creditCardMock);

        $this->assertTrue($adapter->collectMoney(200));
    }

    public function testCreditCardAdapter_CollectMoney_Failure()
    {
        $creditCardMock = $this->createMock(CreditCard::class);
        $creditCardMock->method('authorizeTransaction')
            ->willReturn('Error');

        $adapter = new CreditCardAdapter($creditCardMock);

        $this->assertFalse($adapter->collectMoney(200));
    }
}
