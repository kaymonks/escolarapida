<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = 'mensagens';
    protected $primaryKey = 'id';
    protected $fillable = ['titulo', 'corpo', 'lido'];

}
