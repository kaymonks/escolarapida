<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        return view('login.index');
    }

    public function entrar(LoginRequest  $request)
    {
        $dados = $request->all();
//    die('tesrte');

        if (Auth::attempt(['email'=>$dados['email'], 'password'=>$dados['senha'], 'permission_id'=>1])){ //admim
            return redirect()->intended('/escolas');
        }elseif (Auth::attempt(['email'=>$dados['email'], 'password'=>$dados['senha'], 'permission_id'=>2])) { //escolas
            return redirect()->intended('/responsaveis');

        }elseif (Auth::attempt(['email'=>$dados['email'], 'password'=>$dados['senha'], 'permission_id'=>3])) { //professor

            return redirect()->intended('/mensagens');
        }elseif (Auth::attempt(['email'=>$dados['email'], 'password'=>$dados['senha'], 'permission_id'=>4])) { //pais
//
             return redirect()->intended('/mensagens');
        }
        else{
//            dd($dados);

            return redirect()->intended('/login');
        }
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
