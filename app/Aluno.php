<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'alunos';
    protected $primaryKey = 'id';
    protected $fillable = ['turma_id', 'nome', 'pai_id', 'data_nascimento', 'sexo', 'telefone_id'];

    public function pais()
    {
        return $this->belongsTo('App\Pai', 'pai_id', 'id');
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
