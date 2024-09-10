<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
            'cv' => ['required', 'file', 'mimes:pdf'],
            'photo' => ['required', 'file', 'mimes:jpg,jpeg,png'],
            'address' => ['required', 'min:5', 'max:255'],
            'telephone_number' => ['nullable', 'min:6', 'max:20'],
            'service' => ['required', 'min:10', 'max:1000'],
            'visible' => ['required', 'boolean'],
            'specializations' => ['array', 'required']
        ];
    }
}
