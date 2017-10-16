<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $table = 'escolas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome', 'telefone_id', 'diretor', 'email', 'endereco', 'cep', 'numero', 'bairro', 'estado', 'cidade',
    ];

    public function telefones()
    {
        return $this->belongsTo('App\Telefone', 'telefone_id', 'id');
    }

}
