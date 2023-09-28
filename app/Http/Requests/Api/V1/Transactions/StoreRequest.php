<?php

namespace App\Http\Requests\Api\V1\Transactions;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    const MIN_AMOUNT = '5000';

    const MAX_AMOUNT = '50000000';
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => [
                'required',
                'integer',
                'min:' . self::MIN_AMOUNT,
                'max:' . self::MAX_AMOUNT,
            ]
        ];
    }
}
