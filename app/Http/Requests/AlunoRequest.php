<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'pai_id' => 'required',
            'turma_id' => 'required',
            'data_nascimento' => 'required',
            'sexo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => "O campo Nome é obrigatório.",
            'pai_id.required' => "O campo Pai é obrigatório.",
            'turma_id.required' => "O campo Turma é obrigatório.",
            'data_nascimento.required' => "O campo Data de Nascimento é obrigatório.",
            'telefone.required' => "O campo Telefone é obrigatório.",
            'sexo.required' => "O campo Sexo é obrigatório.",
        ];
    }
}
