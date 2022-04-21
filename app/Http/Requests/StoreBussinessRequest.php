<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBussinessRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:150'],
            'address' => ['required', 'string', 'max:150'],
            'telephone' => ['required', 'string', 'min:10', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'aboutUs' => ['string', 'max:2000'],
            'mission' => ['string', 'max:2000'],
            'vision' => ['string', 'max:2000'],
            'accountTwitter' => ['string', 'max:100'],
            'accountFacabook' => ['string', 'max:100'],
            'accountInstagram' => ['string', 'max:100'],
            'accountLinkedin' => ['string', 'max:100'],
            'motto' => ['string', 'max:100'],
            'logo' => "image|mimes:jpeg,png|max:3000",
        ];
    }
}
