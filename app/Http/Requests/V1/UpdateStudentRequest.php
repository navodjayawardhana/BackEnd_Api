<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method === 'PUT') {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:students,email,' . $this->student->id,
                'date_of_birth' => 'required|date',
                'address' => 'nullable|string|max:255',
            ];
        } else {
            return [];
        }
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'name' => strtoupper($this->name),
        ]);

        if (!$this->has('address')) {
            $this->merge([
                'address' => 'Default Address',
            ]);
        }
    }
}