<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Services\Payment\IPaymentProcessor;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @param PaymentRequest $request
     * @param IPaymentProcessor $paymentProcessor
     * @return JsonResponse
     * @author arafath
     * @description
     * @startOn 29/03/2023
     * @endOn 29/03/2023
     */
    public function process(PaymentRequest $request, IPaymentProcessor $paymentProcessor): \Illuminate\Http\JsonResponse
    {
        try {
            $payload = $request->all();
            $payload['client_id'] = 1; // demo purpose

            $paymentProcessor->processPayment($payload);

            //log transaction

            return response()->json([
                'message' => 'Payment transaction is successful.',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Something went wrong. Please contact Administrator.',
            ], 500);
        }
    }
}
