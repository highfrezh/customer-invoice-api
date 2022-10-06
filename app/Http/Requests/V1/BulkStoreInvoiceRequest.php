<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BulkStoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //if data coming is going to be of form ==
        /**
         * data: [
         * {}
         * {}
         * ]
         * then the rules wil be
         * 'data.*.customerId' like so.
         */

        return [
            '*.customerId' => ['required', 'integer'],
            '*.amount' => ['required','numeric'],
            '*.status' => ['required', Rule::in(['B', 'P','V','b','p','v'])],
            '*.billedDate' => ['required', 'date_format:Y-m-d H:i:s'],
            '*.paidDate' => ['date_format:Y-m-d H:i:s', 'nullable'],
        ];
    }

    protected function prepareForValidation(){
        $data = [];

        foreach($this->toArray() as $obj){
            $obj['customer_id'] = $obj['customerId'] ?? null;
            $obj['billed_dated'] = $obj['billedDate'] ?? null;
            $obj['paid_dated'] = $obj['paidDate'] ?? null;

            $data[] = $obj;
        }

        $this->merge($data);
    }
}
