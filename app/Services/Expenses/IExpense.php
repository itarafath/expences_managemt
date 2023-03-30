<?php

namespace App\Services\Expenses;

interface IExpense
{

    /**
     * @param string $accountId
     * @param string $token
     */
    public function __construct(string $accountId, string $token);

    public function connect();

    public function syncExpenses();
}
