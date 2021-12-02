<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends \App\Http\Requests\BaseCustomRequest
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
            // 'name' => 'required|unique:events',
            'type' => 'required|string',
            'tickets' => 'required|integer',
            'end_date' => 'required',
            'start_date' => 'required',
            'isFree' => 'required',
            'price' => 'required_if:pricing,sinple',
            'ticketCategories' => 'required_if:pricing,multiple',
            'description' => 'required|string',
        ];
    }
}
