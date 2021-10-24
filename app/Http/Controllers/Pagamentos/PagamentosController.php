<?php

namespace App\Http\Controllers\Pagamentos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;

class PagamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $user = Auth::user()->id;
        $data = $request->validate([
            'numeroCard' => 'required|max:16|min:16',
            'bandeiraCard' => 'required',
            'expiraCard' => 'required',
            'expiraCardAno' => 'required',
            'cvv' => 'required|max:3|min:3',
            'nome' => 'required',
            'cpf' => 'required',
            'ddd' => 'required|max:2',
            'phone_number' => 'required',
            'email' => 'required|email',
            'rua' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'cep' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'endCobranca' => 'required',
            'numCobranca' => 'required',
            'compCobranca' => 'required',
            'cidadeCobranca' => 'required',
            'estadoCobranca' => 'required',
            'cepCobranca' => 'required',
            'nomeCartao' => 'required',
            'cpfCartao' => 'required',
            'nascCartao' => 'required',
            'dddCartao' => 'required|max:2',
            'telefoneCartao' => 'required',
        ]);

        $buscaPedido = Pedido::findOrFail($user);
        $dadosPgto = array(
            'idPedido' => $buscaPedido->id,
            'numberCard' => $data['numeroCard'],
            'bandeiraCard' => $data['bandeiraCard'],
            'expiraCard' => $data['expiraCard'],
            'expiraCardAno' => $data['expiraCardAno'],
            'cvv' => $data['cvv'],
            'nome' => $data['nome'],
            'cpf' => $data['cpf'],
            'ddd' => $data['ddd'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'rua' => $data['rua'],
            'numero' => $data['numero'],
            'complemento' => $data['complemento'],
            'bairro' => $data['bairro'],
            'cep' => $data['cep'],
            'cidade' => $data['cidade'],
            'estado' => $data['estado'],
            'endCobranca' => $data['endCobranca'],
            'numCobranca' => $data['numCobranca'],
            'compCobranca' => $data['compCobranca'],
            'cidadeCobranca' => $data['cidadeCobranca'],
            'estadoCobranca' => $data['estadoCobranca'],
            'cepCobranca' => $data['cepCobranca'],
            'nomeCartao' => $data['nomeCartao'],
            'cpfCartao' => $data['cpfCartao'],
            'nascCartao' => $data['nascCartao'],
            'dddCartao' => $data['dddCartao'],
            'telefoneCartao' => $data['telefoneCartao'],
            'formaPgto' => 'Credito',
        );

        $dadosFinais = json_encode($dadosPgto);
        $url = "https://wfsoftware.000webhostapp.com/pagamentos/pagseguro.php";
        $headers = array(
            "Content-Type: application/json",
        );
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dadosFinais);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        curl_close($curl);
        return redirect()->intended('/')->with('success', 'Pedido finalizado com sucesso!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
