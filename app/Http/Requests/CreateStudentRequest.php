<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateStudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'student_number' => ['required', 'min:3', 'unique:App\Models\Student,student_number',],
            'firstname' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'email' => [
                'required',
                'email',
                'unique:App\Models\Student,email',
            ],
            'phone' => ['required', 'numeric'],
            'password' => ['nullable', 'sometimes', 'min:5'],
            'level' => ['required', 'numeric'],
            'department' => ['required', 'numeric'],
        ];
    }
}
