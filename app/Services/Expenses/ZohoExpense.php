<?php

namespace App\Services\Expenses;

use AllowDynamicProperties;
use App\Models\Transaction;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

#[AllowDynamicProperties]
class ZohoExpense implements IExpense
{
    public function __construct(public readonly string $accountId,public readonly string $token)
    {
        $this->api = $this->connect();
    }

    /**
     * @return PendingRequest
     * @author arafath
     * @description This method is used to connect to Zoho Expense API
     * @startOn 30/03/2023
     * @endOn 30/03/2023
     */
    public function connect(): PendingRequest
    {
        return Http::baseUrl(config('zoho.base_url'))->withHeaders([
            'Zoho-oauthtoken' => $this->token
        ]);
    }

    /**
     * @author arafath
     * @description This method is used to sync expenses to Zoho Expense
     * @startOn 30/03/2023
     * @endOn 30/03/2023
     */
    public function syncExpenses()
    {
        $transactions = Transaction::where('is_synced', false)->get();

        foreach ($transactions as $item) {
            $this->api->post('/expenses', [
                // api request body
                'account_id' => $this->accountId,
                "date"=> $item->transaction_date,
                'amount' => $item->transaction_amount
                // .....
            ]);
        }
    }
}
