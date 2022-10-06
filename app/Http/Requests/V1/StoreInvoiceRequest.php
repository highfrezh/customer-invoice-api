<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customerId' => ['required', 'integer'],
            'amount' => ['required','numeric'],
            'status' => ['required', Rule::in(['B', 'P','V','b','p','v'])],
            'billedDate' => ['required', 'date_format:Y-m-d H:i:s'],
            'paidDate' => ['date_format:Y-m-d H:i:s', 'nullable'],
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'customer_id' => $this->customerId,
            'billed_dated' => $this->billedDate,
            'paid_dated' => $this->paidDate,
        ]);
    }
}
