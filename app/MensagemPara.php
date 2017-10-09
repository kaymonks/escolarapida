<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensagemPara extends Model
{
    protected $table = 'mensagem_paras';
    protected $primaryKey = 'id';
    protected $fillable = ['mensagem_id', 'escola_id', 'turma_id', 'pai_id'];
}
