<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professores';
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'telefone_id', 'data_nascimento', 'email', 'sexo', 'endereco', 'cep', 'numero', 'bairro', 'estado', 'cidade'];

    public function turmas()
    {
        return $this->belongsToMany('App\Turma', 'turma_professores', 'professor_id', 'turma_id');
    }

    public function telefones()
    {
        return $this->belongsTo('App\Telefone', 'telefone_id', 'id');
    }
}
