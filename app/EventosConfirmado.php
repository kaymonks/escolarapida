<?php
/**
 * Created by PhpStorm.
 * User: kaymo
 * Date: 06/05/2018
 * Time: 00:16
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class EventosConfirmado extends Model
{
    Protected $table = 'eventos_confirmados';
    Protected $primaryKey = 'id';
    protected $fillable = ['evento_id', 'responsavel_id', 'confirmado'];

    public function responsaveis()
    {
        return $this->hasMany('App\Responsavel', 'id', 'responsavel_id');
    }
}