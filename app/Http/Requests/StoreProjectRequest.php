<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' =>'required|max:5000',
            'project_image' => 'file|max:4096|required|mimes:jpg,bmp,png',
            'project_date' => 'required|date',
            'link_github' => 'required|max:255',
            'type_id'=> 'nullable|exists:types,id',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Il campo :attribute deve essere inserito',
            'project_date.date' => 'La data di presentazione deve essere valida',
            'max' => 'Il campo :attribute deve essere :max caratteri',
            'project_image' => 'Inserisci un file per la copertina',
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
            'link_github' => 'link_github',
        ];
    }
}
