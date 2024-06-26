<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       
       $user =$this->user();
        
        return $user = null && $user->tokenCan('create'); 

        
        //return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required','email'],
            'date_of_birth' => ['required'],
            'address' => ['required'],
        ];
    }

}