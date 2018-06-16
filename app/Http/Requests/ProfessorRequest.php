<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorRequest extends FormRequest
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
            'sexo' => 'required',
            'email' => 'email',
            'endereco' => 'required',
            'login' => 'required',
            'senha' => 'required|min:3',

        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'data_nascimento.required' => 'O campo Data de Nascimento é obrigatório.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'email.email' => 'Insira um email válido',
            'sexo.required' => 'O campo sexo é obrigatório.',
            'endereco.required' => 'O campo endereço é obrigatório.',
            'login.required' => 'Campo login obrigatório',
            'senha.required' => 'Campo login obrigatório',
            'senha.min' => 'Senha muito curta. Escolha uma senha mais segura.',
        ];
    }
}
