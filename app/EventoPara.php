<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoPara extends Model
{
    Protected $table = 'evento_paras';
    Protected $primaryKey = 'id';
	protected $fillable = ['evento_id', 'escola_id', 'turma_id', 'pai_id'];
}
