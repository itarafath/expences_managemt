<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'transaction_id' => 'required',
            'token' => 'required',
            'transaction_type' => 'required|in:D,C',
            'transaction_status' => 'required|boolean',
            'merchant_code' => 'required',
            'merchant_name' => 'required',
            'merchant_country' => 'required',
            'currency' => 'required|size:3',
            'amount' => 'required|numeric',
            'transaction_currency' => 'required|size:3',
            'transaction_amount' => 'required|numeric',
            'auth_code' => 'required',
            'transaction_date' => 'required|date',
        ];
    }
}
