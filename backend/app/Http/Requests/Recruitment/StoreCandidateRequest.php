<?php

namespace App\Http\Requests\Recruitment;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
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
            'vacancie' => 'required|uuid',
            'name' => 'required|string|min:1|max:255',
            'indicatedBy' => 'nullable|string|min:1|max:255',
            'cpf' => 'required|cpf_cnpj',
            'email' => 'required|email',
            'phone' => 'required|string|regex:/^[1-9][0-9]*$/',
            'cep' => 'nullable|string|min:8|max:8',
            'professionalSummary' => 'nullable|string|min:1|max:5000',
            'academicBackground' => 'nullable|string|min:1|max:5000',
            'professionalExperience' => 'nullable|string|min:1|max:5000',
            'additionalInformation' => 'nullable|string|min:1|max:5000',
            'file' => 'nullable|file|max:2048',
            'consent' => ['required', 'in:true,false,1,0'],
        ];
    }
}
