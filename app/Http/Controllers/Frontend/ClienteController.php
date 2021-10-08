<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Hash;

class ClienteController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'senha' => 'required',
        ]);

        $dados = $request->only('email', 'senha');
        if (Auth::attempt($dados)) {
            return redirect()->intendend('user/carrinho');
        }
        return redirect("frontend/login")->withSuccess('Ops, e-mail ou senha incorretos!');
    }

    public function registrar()
    {
        return view('frontend/registrar');
    }

    public function criar(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|unique:clientes',
            'senha' => 'required|min:6',
            'tel' => 'required|',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'cep' => 'required|',
            'cpf' => 'required|',
        ]);

        $dados = $request->all();
        $check = $this->insereBd($dados);

        return redirect()->intended('frontend/login');
    }

    public function insereBd(array $dados)
    {
        return Cliente::create([
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'senha' => Hash::make($dados['senha']),
            'tel' => $dados['tel'],
            'rua' => $dados['rua'],
            'numero' => $dados['numero'],
            'bairro' => $dados['bairro'],
            'cidade' => $dados['cidade'],
            'cep' => $dados['cep'],
            'cpf' => $dados['cpf'],
        ]);
    }
}
