<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'name' => 'nullable|string|min:3|max:100',
            'surname' => 'nullable|string|min:3|max:100',
            'email' => 'required|string|email|max:255',
            'review_text' => 'required|string|min:100|max:3000',
            'profile_id' => 'required|exists:profiles,id', // Assumiamo che la relazione sia con 'profiles'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'review_text.required' => 'Review text is required.',
            'profile_id.exists' => 'The associated profile does not exist.'
        ];
    }
}
