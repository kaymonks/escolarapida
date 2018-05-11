<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaiRequest extends FormRequest
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
            'data_nascimento' => 'required',
            'telefone' => 'required',
            'email' => 'email',
            'sexo' => 'required',
            'endereco' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome é obrigatório.',
            'data_nascimento.required' => 'O campo Data de Nascimento é obrigatório.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'email.required' => 'O campo Email é obrigatório',
            'email.email' => 'Insira um email válido',
            'sexo.required' => 'O campo Sexo é obrigatório.',
            'endereco.required' => 'O campo Endereço é obrigatório.',
        ];
    }
}
