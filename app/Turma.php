<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Professor;

class Turma extends Model
{
    protected $fillable = [
        'ano',
    ];

    public function Professores()
    {
         return $this->belongsToMany('App\Professor')->withTimestamps();
    }
}
