<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculateExchangeRateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'from' => 'required|string|exists:currency_name,currency_code',
            'to' => 'required|string|exists:currency_name,currency_code',
            'amount' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'from.required' => 'Поле "from" обязательно для заполнения.',
            'from.string' => 'Поле "from" должно быть строкой.',
            'from.exists' => 'Выбранная валюта "from" не существует.',

            'to.required' => 'Поле "to" обязательно для заполнения.',
            'to.string' => 'Поле "to" должно быть строкой.',
            'to.exists' => 'Выбранная валюта "to" не существует.',

            'amount.required' => 'Поле "amount" обязательно для заполнения.',
            'amount.numeric' => 'Поле "amount" должно быть числом.',
            'amount.min' => 'Значение поля "amount" должно быть не меньше :min.',
        ];
    }

}
