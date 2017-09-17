<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
        'nome', 'telefone', 'login', 'senha',
    ];

    public function Turmas()
    {
        return $this->belongsToMany('App\Turma')->withTimestamps();
    }
}
