<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MensagemRequest extends FormRequest
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
//            'destinatario' => 'required',
            'titulo' => 'required',
            'corpo' => 'required',
        ];
    }

    public function messages()
    {
        return [
//            'destinatario.required' => 'O campo Destinatário é obrigatório',
            'titulo.required' => 'O campo Título é obrigatório',
            'corpo.required' => 'O Conteúdo da mensagem é obrigatório',
        ];
    }
}
