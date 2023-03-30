<?php

namespace App\Http\Controllers;

use App\Models\client;

class ExpenseController extends Controller
{
    public function sync()
    {
        try {
            $client = Client::where('id', 1)->first();
            $expenseService = app()->make($client->account_system_name, ['accountId' => $client->account_id, 'token' => $client->token]);
            $expenseService->syncExpenses();

            return response()->json([
                'message' => 'Expenses synced successfully',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
