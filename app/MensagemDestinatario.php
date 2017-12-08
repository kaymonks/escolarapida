<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensagemDestinatario extends Model
{
    protected $table = 'mensagem_destinatario';
    protected $primaryKey = 'id';
    protected $fillable = ['mensagem_id', 'destinatario_id', 'destinatario_escola_id', 'destinatario_professor_id', 'destinatario_turma_id', 'tipo_destinatario'];
}
