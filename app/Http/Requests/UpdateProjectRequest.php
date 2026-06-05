<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'project_date' => 'required|date',

            'link_github' => 'required|string|url',
            'github_url' => 'nullable|string|url',

            'project_image' => 'nullable|image|max:2048',

            'types' => 'nullable|array',
            'types.*' => 'exists:types,id',

            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Il campo :attribute deve essere inserito',
            'project_date.date' => 'La data di presentazione deve essere valida',
            'max' => 'Il campo :attribute deve essere :max caratteri',
            'project_image.mimes' => "Il file deve essere un'immagine",
            'project_image.max' => 'La dimensione del file deve essere massimo di 4096 KB'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nome',
            'description' => 'descrizione',
            'project_image' => 'immagine progetto',
            'project_date' => 'data di consegna',
            'link_github' => 'link demo',
            'github_url' => 'repository github',
        ];
    }
}
