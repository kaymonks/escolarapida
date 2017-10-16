<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pai extends Model
{
    protected $table = 'pais';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome', 'telefone_id', 'sexo', 'data_nascimento', 'email', 'endereco', 'cep', 'numero', 'bairro', 'estado', 'cidade',
    ];

    public function alunos()
    {
        return $this->hasMany('App\Aluno');
    }

    public function telefones()
    {
        return $this->belongsTo('App\Telefone', 'telefone_id', 'id');
    }
}
