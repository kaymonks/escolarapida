<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Turma extends Model
{
    protected $table = 'turmas';
    protected $primaryKey = 'id';
    protected $fillable = ['ano'];

    public function professores()
    {
         return $this->belongsToMany('App\Professor', 'turma_professores', 'turma_id', 'professor_id');
    }

    public function alunos()
    {
        return $this->hasMany('App\Aluno');
    }
}
