<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdRequest extends \App\Http\Requests\BaseCustomRequest
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
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            // 'expiry_date' => 'required|date',
            // 'issued_date'=>'required|date',
            'template_name'=>'required|string',
            'category' =>'required',

        ];
    }
}
