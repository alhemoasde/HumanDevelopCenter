<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideosRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:10', 'max:100'],
            'description' => ['required', 'string', 'max:2000'],
            'url' => "nullable|mimes:mp4|max:500000",
            'url-text' => ['nullable', 'string', 'min:10', 'max:100'],
        ];
    }
}
