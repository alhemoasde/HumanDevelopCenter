<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventsRequest extends FormRequest
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
            'descripion' => ['required', 'string', 'max:2000'],
            'dateStart' => ['date', 'after:today'],
            'dateFinish' => ['date', 'after_or_equal:dateStart'],
            'hourFinish' => ['after_or_equal:hourStart'],
            'status' => ['required','string', 'min:5', 'max:50'],
            'mission' => ['string', 'max:2000'],
        ];
    }
}
