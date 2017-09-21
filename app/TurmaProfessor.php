<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Professor;

class TurmaProfessor extends Model
{
    protected $table = 'turma_professores';
    protected $fillable = ['turma_id', 'professor_id'];

    public function professores()
    {
        return $this->belongsTo('App\Professor');
    }

    public function turmas()
    {
        return $this->hasMany('App\Turma');
    }

}
