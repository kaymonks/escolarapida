<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoResponsavel extends Model
{
    protected $table = 'aluno_responsavel';
    protected $fillable = ['aluno_id', 'responsavel_id'];

    public function responsaveis()
    {
        return $this->belongsTo('App\Responsavel');
    }

    public function alunos()
    {
        return $this->belongsTo('App\Aluno');
    }
}
