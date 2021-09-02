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
            'name'=>'required|min:3|regex:/^\S*$/u',
            'lname'=>'required|min:3|regex:/^S*$/u',
            'email'=>'required|email|unique:employees',
            'mobile'=>'required|numeric|min:10|max:12',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required'=>'Please enter name',
            'name.regex'=>'Whitespace not allowed',
            'lname.required'=>'Please enter last name',
            'lname.regex'=>'Whitespace not allowed',
            'email.required'=>'Please enter email',
            'mobile.required'=>'Please enter mobile number',
            'mobile.numeric'=>'The mobile must be a number.'
        ];
    } 

   
}


