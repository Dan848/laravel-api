<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "repo_name" => ["required", "unique:projects", "max:150", "min:2"],
            'repo_link' => ['required'],
            'name' => ["required", 'max:255'],
            'image' => [''],
            'created_on' => ["required", "date_format:Y-m-d"],
            "description" => ["nullable"],
        ];
    }


    public function messages() {
        return [
                'repo_name.required' => 'Il campo Nome Repo è obbligatorio.',
                'repo_name.min' => 'Il campo Nome Repo deve contenere almeno :min caratteri.',
                'repo_name.max' => 'Il campo Nome Repo deve contenere al massimo :max caratteri.',
                'repo_name.unique' => 'Il campo Nome Repo deve essere unico tra i progetti.',
                'repo_link.required' => 'Il campo Link Repo è obbligatorio.',
                'name.required' => 'Il campo Nome è obbligatorio.',
                'name.max' => 'Il campo Nome deve contenere al massimo :max caratteri.',
                'image' => 'Il campo Immagine da errore',
                'created_on.required' => 'Il campo Data Creazione è obbligatorio.',
                'created_on.date_format' => 'Errore formato data',
        ];
    }
}
