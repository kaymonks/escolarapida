<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'alunos';
    protected $primaryKey = 'id';
    protected $fillable = ['turma_id', 'nome', 'pai_id'];

    public function pais()
    {
        return $this->hasOne('App\Pai', 'id');
    }

    public function turmas()
    {
        return $this->hasOne('App\Turma', 'id');
    }
}
