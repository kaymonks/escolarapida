<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'alunos';
    protected $primaryKey = 'id';
    protected $fillable = ['turma_id', 'telefone_id', 'escola_id', 'nome', 'data_nascimento', 'sexo'];

    public function responsaveis()
    {
        return $this->belongsToMany('App\Responsavel');
    }
    public function responsaveiss()
    {
        return $this->belongsToMany('App\Responsavel', 'aluno_responsavel', 'aluno_id', 'responsavel_id');
    }

    public function turmas()
    {
        return $this->belongsTo('App\Turma', 'turma_id', 'id');
    }

    public function telefones()
    {
        return $this->belongsTo('App\Telefone', 'telefone_id', 'id');
    }
}
