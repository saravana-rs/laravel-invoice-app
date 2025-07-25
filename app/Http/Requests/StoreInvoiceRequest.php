<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
   {
    return [
        'client_name' => 'required|string|max:255',
        'email' => 'required|email',
        'tax_percentage' => 'required|numeric|min:0',

        'items' => 'required|array|min:1',
        'items.*.item_description' => 'required|string|max:255',
        'items.*.quantity' => 'required|integer|min:1',
        'items.*.price_per_item' => 'required|numeric|min:0',
    ];
   }

}
