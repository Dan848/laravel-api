<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTechnologyRequest extends FormRequest
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
            "name" => ["required", "unique:technologies", "max:150"],
            'image' => ['nullable'],
        ];
    }


    public function messages() {
        return [
                'name.required' => 'Il campo Nome è obbligatorio.',
                'name.max' => 'Il campo Nome deve contenere al massimo :max caratteri.',
                'name.unique' => 'Il campo Nome deve essere unico tra le tecnologie.',
                'image' => 'Il campo Immagine da errore',
        ];
    }
}
