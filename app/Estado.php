<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $primaryKey = "id";
    protected $fillable = ['nome'];

    public function cidades() {
        return $this->hasMany('App\Cidade');
    }

    public function selectEstados(){
        $options = "<option value=\"\">Selecione o Estado</option>";

        $estados = Estado::all();

        foreach ($estados as $estado) {
            $options .= "<option value=\"{$estado->id}\">{$estado->estado}</option>";
        }

        return $options;
    }
}
