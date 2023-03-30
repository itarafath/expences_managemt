<?php

namespace Database\Factories;

use App\Services\Expenses\ZohoExpense;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'account_system_name' => ZohoExpense::class,
            'account_id' => '806873893',
            'token' => '1000.Z812I0MLPN65CW11GGGYNQDCB1U10E',
        ];
    }
}
