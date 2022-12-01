<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentProfileRequest extends FormRequest
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
            'firstname' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'email' => [
                'required',
                'email',
                Rule::unique('students')->ignore(auth()->id()),
            ],
            'phone' => ['required', 'numeric'],
            'password' => ['nullable', 'sometimes', 'min:5'],
        ];
    }
}
