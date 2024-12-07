<?php

namespace App\Http\Requests\Recruitment;

use Illuminate\Foundation\Http\FormRequest;

class ResumeStageHistoriesSaveRequest extends FormRequest
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
            'candidateId' => 'required|exists:recruitments.candidates,id',
            'vacancyUuid' => 'required|exists:recruitments.vacancies,uuid',
            'recruitmentStageId' => 'required|exists:recruitments.recruitment_stages,id',
            'resumeId' => 'required|exists:recruitments.resumes,id',
            'observation' => 'nullable|string|min:1|max:5000',
            'startTime' => 'nullable|date|after_or_equal:today',
            'endTime' => 'nullable|date|after_or_equal:today'
        ];
    }
}
