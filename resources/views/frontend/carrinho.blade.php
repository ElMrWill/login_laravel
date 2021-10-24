@extends('frontend.layout')

@section('title')
    WF Store | Seu Carrinho.
@endsection

@section('content')
    <div class="content">
                <table class="customers">
                    <thead>
                        <tr>
                            <td class="text-center p-0 align-middle" width="70">Imagem </td>
                            <td class="text-center p-0 align-middle" width="70">Nome </td>
                            <td class="text-center p-0 align-middle" width="70">Unitário</td>
                            <td class="text-center p-0 align-middle" width="70">Quantidade</td>
                            <td class="text-center p-0 align-middle" width="70">Preço</td>
                            <td class="text-center p-0 align-middle" width="70">Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($produto as $items)
                    <div style="visibility: hidden">{{$multiplica = $items->produto->valor * $items->quantidade}}</div>
                        <tr>
                            <td class="text-center p-0 align-middle" width="70"><img src="{{ asset("images/{$items->produto->image}") }}" alt="{{$items->produto->nome}}" height="70px"/></td>
                            <td class="text-center p-0 align-middle" width="70">{{ $items->produto->nome }}</td>
                            <td class="text-center p-0 align-middle" width="70">R$ {{number_format($items->produto->valor, '2', ',', '.')  }}</td>
                            <td class="text-center p-0 align-middle" width="70">{{ $items->quantidade }}</td>
                            <td class="text-center p-0 align-middle" width="70">R$ 
                                {{
                                    number_format($multiplica, '2', ',', '.')
                                }}
                            </td>
                            <td class="text-center p-0 align-middle" width="70">
                                <form action="{{ route('carrinho.destroy', $items->id)}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                </table>
                <div class="finaliza">
                    <div class="btnCaixa">
                        <a href="{{ route('cria.checkout')}}">
                            IR PARA O CAIXA
                        </a>
                    </div>
                </div>
@endsection