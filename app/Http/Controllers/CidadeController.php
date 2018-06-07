<?php
/**
 * Created by PhpStorm.
 * User: kaymo
 * Date: 09/05/2018
 * Time: 14:56
 */


use App\Estado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CidadeController extends Controller
{
    private $estadoModel;

    public function __construct(Estado $estado=null)
    {
        $this->estadoModel = $estado;
    }

    public function index()
    {
        $estados = $this->estadoModel->list('estado', 'id');
        return $estados;
//        return view('cidade', compact('estados'));
    }

    public function getCidades($idEstado)
    {
        $estado = $this->estadoModel->find($idEstado);
        $cidades = $estado->cidades()->getQuery()->get(['id', 'cidade']);
        return Response::json($cidades);
    }

}