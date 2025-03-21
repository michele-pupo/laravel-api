<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTechnologyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'project_image' => 'nullable|image|max:2048',
            'project_date' => 'required|date',
            'link_github' => 'required|url',
            'types' => 'nullable|array',
            'types.*' => 'exists:types,id',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id',
        ];
    }
}
