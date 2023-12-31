<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTecnologyRequest extends FormRequest
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
            // la parte $this->tecnology->id serve per dire di ignorare il record in esame per questa regola
            'label' => ['required', 'string', 'max:20', 'unique:tecnologies,label,' . $this->tecnology->id],
            'color' => ['required', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/']
        ];
    }

    public function messages()
    {
        return [
            'label.required' => 'il label è obbligatiorio',
            'label.string' => 'il label deve essere un testo',
            'label.max' => 'il label deve essere max di 20 caratteri',
            'label.unique' => 'il label esiste già',

            'color.required' => 'il colore è necessario',
            'color.regex' => 'il colore deve essere in esadecimale'
        ];
    }
}