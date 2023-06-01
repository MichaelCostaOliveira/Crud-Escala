<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColaboradorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'escala_trabalho_id' => 'required|integer',
            'matricula' => 'required',
            'cpf' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório!',
            'escala_trabalho_id.required' => 'Escala é obrigatório!',
            'matricula.required' => 'Matricula é obrigatório!',
            'cpf.required' => 'Cpf é obrigatório!',
        ];
    }
}
