<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Carrinho;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $produtoPrincipal = Produto::where('categoria', 'cat01')->take(6)->get();
        return view('frontend.index', compact('produtoPrincipal'));
    }

    public function verifica($id)
    {
        if (Auth::check()) {
            $idUser = Auth::user()->id;
            $valorItem = Produto::findOrFail($id);
            $infoPedido = [
                'produto_id' => $id,
                'quantidade' => '1',
                'detalhes' => '',
                'user_id' => $idUser,
            ];
            Carrinho::create($infoPedido);

            return redirect()->intended('/')->with('success', 'Item adicionado ao carrinho.');
        }
        return view('frontend/login');
    }

    public function carrinho()
    {
        if (Auth::check()) {
            $idUser = Auth::user()->id;
            $verifica = Carrinho::where('user_id', $idUser)->count();
            if ($verifica != 0) {
                $produto = Carrinho::with('Produto')->where('user_id', $idUser)->get();
                return view('frontend.carrinho', compact('produto'));
            } else {
                return $this->index();
            }
        } else {
            return view('frontend/login');
        }
    }

    public function destroy($id)
    {
        $produtosCase = DB::table('carrinhos')->where('id', $id)->delete();
        return redirect('meu-carrinho');
    }

    public function checkout()
    {
        $idUser = Auth::user()->id;
        $somaItems = Carrinho::join('produtos', 'produtos.id', '=', 'carrinhos.produto_id')->where('carrinhos.user_id', $idUser)->sum('produtos.valor');
        $dadosPedido = [
            'user_id' => $idUser,
            'total' => $somaItems,
            'status_pedido' => '1',
        ];
        $inserePedido = Pedido::create($dadosPedido);
        $pegaCarrinho = Carrinho::where('user_id', $idUser)->get();
        $buscaPedido = Pedido::findOrFail($idUser);
        $valorTotal = $buscaPedido->total;
        foreach ($pegaCarrinho as $itemsCarrinho) {
            $dadosAtualizar = [
                'pedido_id' => $buscaPedido->id,
            ];
            $atualizaCarrinho = Carrinho::where('user_id', $idUser)->update($dadosAtualizar);
        }
        return view("frontend/checkout", compact('valorTotal'));
    }
}
