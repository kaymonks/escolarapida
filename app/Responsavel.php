<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $table = 'responsaveis';
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'sexo', 'data_nascimento', 'telefone_id', 'escola_id', 'email', 'endereco', 'cep', 'numero', 'bairro', 'user_id'];

    public function alunos()
    {
        return $this->belongsToMany('App\Aluno', 'aluno_responsavel', 'aluno_id', 'responsavel_id');
    }

    public function alunoss()
    {
        return $this->belongsToMany('App\Aluno', 'aluno_responsavel', 'responsavel_id', 'aluno_id');
    }

    public function telefones()
    {
        return $this->belongsTo('App\Telefone', 'telefone_id', 'id');
    }
}
