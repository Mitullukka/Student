<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
                'name'=>'required|min:3|regex:/^\S*$/u',
                'email'=>'required|email|unique:companies',
                'logo'=>'required|mimes:jpeg,jpg,png',
                'website'=>'required'
            ];
    }
    public function messages()
    {
        return [
                'name.required'=>'Please enter name',
                'name.regex'=>'Whitespace not allowed',
                'email.required'=>'Please enter email',
                'logo.required'=>'Please select logo',
                'logo.mimes'=>'Only jpeg,jpg,png allowed',
                'website..required'=>'Please enter website'
        ];
    }
}
