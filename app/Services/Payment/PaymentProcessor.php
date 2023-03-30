<?php

namespace App\Services\Payment;

use App\Models\Transaction;

class PaymentProcessor implements IPaymentProcessor
{
    public function processPayment($payload): bool
    {
        Transaction::create($payload);

        return true;
    }
}
