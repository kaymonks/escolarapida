<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = 'mensagens';
    protected $primaryKey = 'id';
    protected $fillable = ['escola_id', 'remetente_escola_id', 'remetente_responsavel_id', 'remetente_professor_id', 'titulo', 'corpo', 'lido', 'data', 'tipo_remetente'];


    public function escolas()
    {
        return $this->belongsTo('App\Escola', 'escola_id', 'id');
    }

    public function remetente()
    {
        return $this->hasOne('App\Professor', 'remetente_id', 'id');
    }
}
