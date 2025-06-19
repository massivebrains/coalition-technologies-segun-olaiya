<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_name' => 'required',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
        ];
    }
}
