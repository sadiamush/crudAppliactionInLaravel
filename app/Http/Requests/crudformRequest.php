<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class crudformRequest extends FormRequest
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
            "username" => "required|regex:/^[a-zA-Z0-9_ ]*$/|max:25",
            "email" => "required|unique:customers|email|max:30",
            "password" => "required|max:20"
        ];
    }
}
