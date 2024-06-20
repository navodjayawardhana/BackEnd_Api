<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreCourseRequst extends FormRequest
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

        
       // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            '*.student_id' => ['required','integer'],
            '*.title' => ['required'],
            '*.description' => ['required'],
        ];
    }

    protected function prepareForValidation(){
        $data=[];
        
        foreach($this ->toArray()as $obj){
            $obj['*.student_id']=$obj['*.student_id'] ?? null;
            $obj['*.title']=$obj['*.title'] ?? null;
            $obj['*.description']=$obj['*.description'] ?? null;

            $data[]=$obj;
        }

        $this->merge($data);
    }

}