<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $table = 'escolas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome', 'telefone_id', 'diretor', 'email', 'endereco', 'cep', 'numero', 'bairro', 'estado', 'cidade', 'user_id',
    ];

    public function telefones()
    {
        return $this->belongsTo('App\Telefone', 'telefone_id', 'id');
    }

    public function usuarios()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function responsaveis()
    {
        return $this->hasMany('App\Responsavel', 'id', 'escola_id');
    }

}
