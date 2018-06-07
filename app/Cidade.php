<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'estado_id'];

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function getCidadesByIdEstado($estadoId = null){
        return DB::table('cidades')->where('estado_id', $estadoId)->orderBy('cidade')->get();
    }

    public function selectCidades($estadoId = null) {
        $cidades = $this->getCidadesByIdEstado($estadoId);

        $options = "<option>Selecione a CidadeController</option>";

        foreach ($cidades as $cidade) {
            $options .= "<option value='{$cidade->id}'>$cidade->cidade</option>".PHP_EOL;
        }
    }

    public function cidadesByIdEstado($estado_id = null) {
        return $this->belongsTo('App\Estado', 'id', 'estado_id');
    }

//    public function getCidades(Request $request) {
//        echo "opa";
//        echo "<script>console.log('teste')</script>";
//        die();
//        $id_estado = $request->input('id_estado');
//
//        echo $teste = new \App\Cidade();
//        echo $teste->cidadesByIdEstado($id_estado);
//    }

}
