<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pai extends Model
{
    protected $fillable = [
        'nome', 'sexo', 'data_nascimento',
    ];

    public function alunos()
    {
        return $this->hasMany('App\Aluno');
    }
}
