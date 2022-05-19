<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:10', 'max:100'],
            'codec' => ['string', 'min:5','max:100'],
            'description' => ['string', 'min:25','max:1000'],
            'priceBuy' => ['nullable','numeric'],
            'priceSell' => ['required', 'numeric', 'min:1'],
            'priceSellUSD' => ['nullable', 'numeric', 'min:1'],
            'paymentLink' => ['nullable','string', 'min:5','max:255'],
            'poster' => "nullable|image|mimes:jpeg,png|max:3000",
            'type' => ['required','string', 'min:5', 'max:100'],
            'events_id'  => ['required', 'exists:events,id'],
            'day' => ['nullable','string', 'min:5', 'max:100'],
            'category' => ['nullable','string', 'min:5', 'max:100'],
        ];
    }
}
