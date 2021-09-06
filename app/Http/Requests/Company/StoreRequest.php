<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Uppercase;

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
                'name'=>['required','min:3','regex:/^\S*$/u',new Uppercase],
                'email'=>'required|email|unique:companies,email,NULL,id,deleted_at,NULL',
                'logo'=>'required|mimes:jpeg,jpg,png',
                'website'=>'required|regex:/^((www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/',
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
                'website.required'=>'Please enter website'
        ];
    }
}
