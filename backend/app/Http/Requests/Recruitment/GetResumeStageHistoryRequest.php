<?php

namespace App\Http\Requests\Recruitment;

use Illuminate\Foundation\Http\FormRequest;

class GetResumeStageHistoryRequest extends FormRequest
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
            'candidate-id' => 'required|exists:recruitments.candidates,id',
            'vacancy-uuid' => 'required|exists:recruitments.vacancies,uuid',
            'resume-id' => 'required|exists:recruitments.resumes,id',
        ];
    }
}
