<?php

namespace App\DTO;

class ExpencesDTO
{
    public function __construct(
        private string $name,
        private string $description,
        private string $amount,
        private string $currency,
        private string $date,
        private string $category,
        private string $paymentMethod,
        private string $paymentProcessor,
    )
    {
    }
}
