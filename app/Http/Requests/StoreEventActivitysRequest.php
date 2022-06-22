<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventActivitysRequest extends FormRequest
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
            'events_id'  => ['required', 'exists:events,id'],
            'users_id'  => ['required', 'exists:users,id'],
            'title' => ['required', 'string', 'min:10', 'max:100'],
            'description' => ['required', 'string', 'min:10', 'max:2000'],
            'dateStart' => ['required', 'date', 'after_or_equal:today'],
            'hourStart' => ['required'],
            'dateFinish' => ['required','date', 'after_or_equal:dateStart'],
            'hoursFinish' => ['required','after:hourStart'],
            'day' => ['required','string', 'min:5', 'max:20'],
        ];
    }
}
