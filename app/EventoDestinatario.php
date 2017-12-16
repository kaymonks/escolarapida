<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoDestinatario extends Model
{
    Protected $table = 'evento_destinatario';
    Protected $primaryKey = 'id';
	protected $fillable = ['evento_id', 'escola_id', 'turma_id', 'responsavel_id'];
}
