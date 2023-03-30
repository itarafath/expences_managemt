<?php

namespace App\Services\Payment;

interface IPaymentProcessor
{
    public function processPayment($payload): bool;
}
