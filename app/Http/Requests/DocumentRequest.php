<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DocumentRequest extends FormRequest
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
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'department' => ['required', 'numeric'],
            'type' => ['required', 'numeric'],
            'status' => ['required', 'numeric'],
            'document_file.*' => ['nullable', 'sometimes', 'file', 'max:10240']
        ];
    }
}
