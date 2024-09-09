<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'name' => ['nullable', 'min:3', 'max:100'],
            'surname' => ['nullable', 'min:3', 'max:100'],
            'email' => ['required','max:255'],
            'telephone_number' => ['nullable', 'min:6', 'max:20'],
            'message_text' => ['required', 'max:3000'],
            'profile_id' => ['required']
        ];
    }
}
