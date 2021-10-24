<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class ClienteController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('Você logou com sucesso!');
        }

        return redirect("frontend/login")->with('success', 'Opa, acesso totalmente negado "mermão"!');
    }

    public function registrar()
    {
        return view('frontend/registrar');
    }

    public function criar(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'ddd' => 'required|min:2',
            'tel' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'cep' => 'required',
            'cpf' => 'required',

        ]);



        $dados = $request->all();
        $check = $this->insereBd($dados);

        return redirect("frontend/login");
    }

    public function insereBd(array $dados)
    {
        return User::create([
            'name' => $dados['name'],
            'email' => $dados['email'],
            'password' => Hash::make($dados['password']),
            'nivel' => '1',
            'ddd' => $dados['ddd'],
            'tel' => $dados['tel'],
            'rua' => $dados['rua'],
            'numero' => $dados['numero'],
            'complemento' => $dados['complemento'],
            'bairro' => $dados['bairro'],
            'cidade' => $dados['cidade'],
            'cep' => $dados['cep'],
            'cpf' => $dados['cpf'],
        ]);
    }



    public function processaPagseguro()
    {
    }
}
