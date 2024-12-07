<?php

namespace App\Http\Requests\Credilus;

use Illuminate\Foundation\Http\FormRequest;

class SearchByName extends FormRequest
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
            'name' => 'required|nullable|string|min:1|max:255',
            'state' => 'nullable|string|min:1|max:255',
            'city' => 'nullable|string|min:1|max:255',
            'neighborhood' => 'nullable|string|min:1|max:255',
            'street' => 'nullable|string|min:1|max:255',
            'number' => 'nullable|string|regex:/^[0-9][0-9]*$/',
        ];
    }
}
