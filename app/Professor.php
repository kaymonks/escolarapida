<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professores';
    protected $primaryKey = 'id';
    protected $fillable = ['telefone_id', 'escola_id', 'nome', 'data_nascimento', 'email', 'sexo', 'endereco', 'cep', 'numero', 'bairro', 'estado', 'cidade', 'user_id'];

    public function turmas()
    {
        return $this->belongsToMany('App\Turma', 'turma_professores', 'professor_id', 'turma_id');
    }

    public function telefones()
    {
        return $this->belongsTo('App\Telefone', 'telefone_id', 'id');
    }

    public function login()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
