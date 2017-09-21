<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professores';
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'telefone'];

    public function turmas()
    {
        return $this->belongsToMany('App\Turma', 'turma_professores', 'professor_id', 'turma_id');
    }
}
