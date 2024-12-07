<?php

namespace App\Http\Requests\Recruitment;

use Illuminate\Foundation\Http\FormRequest;

class StoreVacancyRequest extends FormRequest
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
            'uuid' => 'nullable|string|uuid',
            'companyId' => 'required|integer|min:1',
            'workModeId' => 'required|integer|min:1',
            'title' => 'required|string|min:1|max:255',
            'shortDescription' => 'nullable|string|min:1|max:5000',
            'longDescription' => 'nullable|string|min:1|max:5000',
        ];
    }
}
