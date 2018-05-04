<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensagemDestinatario extends Model
{
    protected $table = 'mensagem_destinatario';
    protected $primaryKey = 'id';
    protected $fillable = ['mensagem_id', 'destinatario_id', 'destinatario_escola_id', 'destinatario_professor_id', 'destinatario_turma_id', 'tipo_destinatario'];

    public function destinatario_prof()
    {
        return $this->hasOne('App\Professor', 'id', 'destinatario_professor_id');
    }

    public function destinatario_resp()
    {
        return $this->hasOne('App\Responsavel', 'id', 'destinatario_id');
    }

    public function destinatario_escola()
    {
        return $this->hasOne('App\Escola', 'id', 'destinatario_escola_id');
    }

    public function mensagens()
    {
        return $this->hasOne('App\Mensagem', 'id', 'mensagem_id');
    }
}
