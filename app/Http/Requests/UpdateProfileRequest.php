<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cv' => ['required', 'file'],
            'photo' => ['required', 'file'],
            'address' => ['required', '5', 'max:255'],
            'telephone_number' => ['nullable', 'min:6', 'max:20'],
            'service' => ['required', 'min:100', 'max:1000'],
            'visible' => ['required', 'boolean']
        ];
    }
}
