<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:100'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'telephone' => ['nullable', 'string', 'min:10', 'max:100'],
            'profile' => ['required','string', 'min:5', 'max:100'],
            'web' => ['nullable', 'string', 'min:5', 'max:100'],
            'accountTwitter' => ['nullable', 'string', 'min:5','max:100'],
            'accountFacabook' => ['nullable', 'string', 'min:5','max:100'],
            'accountInstagram' => ['nullable', 'string', 'min:5', 'max:100'],
            'accountLinkedin' => ['nullable', 'string', 'min:5', 'max:100'],
            'accountTiktok' => ['nullable', 'string', 'min:5', 'max:100'],
            'accountYouTube' => ['nullable', 'string', 'min:5', 'max:100'],
            'accountOther' => ['nullable', 'string', 'min:5', 'max:100'],
            'famousPhrase' => ['nullable', 'string', 'min:5', 'max:255'],
            'biografhy' => ['nullable', 'string', 'min:5', 'max:2000'],
            'photography' => "nullable|image|mimes:jpeg,png|max:3000",
        ];
    }
}
