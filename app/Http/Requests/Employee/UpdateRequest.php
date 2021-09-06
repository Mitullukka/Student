<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $id = $this->id;
        return [
            'fname'=>'required|min:3|regex:/^\S*$/u',
            'lname'=>'required|min:3|regex:/^\S*$/u',
            'email'=>'required|unique:employees,email,'.$id.',id,deleted_at,NULL',
            'mobile'=>'required|numeric|unique:employees,mobile,'.$id
        ];
    }

    public function messages()
    {
        return [
            'fname.required'=>'Please enter name',
            'fname.regex'=>'Whitespace not allowed',
            'lname.required'=>'Please enter last name',
            'lname.regex'=>'Whitespace not allowed',
            'email.required'=>'Please enter email',
            'mobile.required'=>'Please enter mobile number',
            'mobile.numeric'=>'The mobile must be a number.'
        ];
    } 
}

