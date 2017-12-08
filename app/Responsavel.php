<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $table = 'responsaveis';
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'sexo', 'data_nascimento', 'telefone_id', 'escola_id', 'email', 'endereco', 'cep', 'numero', 'bairro', 'estado', 'cidade', 'user_id'];

//    public function professores()
//    {
//        return $this->belongsToMany('App\Professor', 'turma_professores', 'turma_id', 'professor_id');
//    }

    public function alunos()
    {
        return $this->belongsToMany('App\Aluno', 'aluno_responsavel', 'aluno_id', 'responsavel_id');
    }

    public function telefones()
    {
        return $this->belongsTo('App\Telefone', 'telefone_id', 'id');
    }
}
