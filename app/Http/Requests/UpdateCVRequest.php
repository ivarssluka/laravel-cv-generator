<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCVRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'education.*.institution' => 'required|string|max:255',
            'education.*.degree' => 'required|string|max:255',
            'education.*.start_date' => 'required|date',
            'education.*.end_date' => 'nullable|date',
            'work_experience.*.company' => 'required|string|max:255',
            'work_experience.*.position' => 'required|string|max:255',
            'work_experience.*.start_date' => 'required|date',
            'work_experience.*.end_date' => 'nullable|date',
            'work_experience.*.description' => 'nullable|string',
        ];
    }
}
