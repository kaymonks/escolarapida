<?php
/**
 * Created by PhpStorm.
 * User: kaymo
 * Date: 04/05/2018
 * Time: 00:21
 */

namespace App\Http\Controllers;


use App\Escola;
use App\Professor;
use App\Responsavel;
use App\User;

class PerfilController extends Controller
{
    public function index($perfil, $id)
    {
        switch ($perfil){
            case 'escola':
                $registro = Escola::where('user_id', $id)->first();
                $id = Escola::where('user_id', $id)->pluck('id');
                $id = $id[0];
                $telefone = Escola::find($id)->telefones;
                $registro['telefone'] = $telefone->telefone;
                $escola = Escola::find($id)->usuarios;
                $user_id = $escola->id;
                $user = User::find($user_id);
                $registro['login'] = $user->login;
                break;
            case 'responsavel':
                $registro = Responsavel::where('user_id', $id)->first();
                $registro['data_nascimento'] = date( 'd/m/Y' , strtotime($registro->data_nascimento ) );
                $id = $registro->id;
                $telefone = Responsavel::find($id)->telefones;
                $user_id = $registro->user_id;
                $login = User::where('id', $user_id)->pluck('login');
                $registro['login'] = $login[0];
                $registro['telefone'] = $telefone->telefone;
                break;
            case 'professor':
                $registro = Professor::where('user_id', $id)->first();
                $registro['data_nascimento'] = date( 'd/m/Y' , strtotime($registro->data_nascimento ) );
                $id = $registro->id;
                $telefone = Professor::find($id)->telefones;
                $user_id = $registro->user_id;
                $login = User::where('id', $user_id)->pluck('login');
                $registro['login'] = $login[0];
                $registro['telefone'] = $telefone->telefone;
                break;
        }
//        if ($registro['sexo'] == 'm') { $registro['sexo'] = 'Masculino'; }else{ $registro['sexo'] = 'Feminino';}

        switch ($perfil) {
            case 'escola':
                return view('perfilEscola', compact('registro', 'perfil', 'id'));
                break;
            case 'responsavel':
                return view('perfil', compact('registro', 'perfil', 'id'));
                break;
            case 'professor':
                return view('perfil', compact('registro', 'perfil', 'id'));
                break;
        }
    }


}