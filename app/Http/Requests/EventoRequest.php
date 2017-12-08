<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
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
            'destinatario' => 'required',
            'titulo' => 'required',
            'date' => 'required',
            'time' => 'required',
            'descricao' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'destinatario.required' => 'O campo Destinatário é obrigatório',
            'titulo.required' => 'O campo Título é obrigatório',
            'date.required' => 'O campo Data é obrigatório',
            'time.required' => 'O campo Horas é obrigatório',
            'descricao.required' => 'O campo Descrição é obrigatório',
        ];
    }
}
