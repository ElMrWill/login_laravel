@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if(session('sucess'))
                            <div class="alert alert-sucess" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif
                    </div>

                    <table class="tble table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center p-0 align-middle" width="70">ID</td>
                                <td class="text-center p-0 align-middle" width="70">Ícone</td>
                                <td class="text-center p-0 align-middle" width="70">Nome</td>
                                <td class="text-center p-0 align-middle" width="70">Preço</td>
                                <td class="text-center p-0 align-middle" width="70">Quantidade</td>
                                <td class="text-center p-0 align-middle" width="70">Quantidade Vendidas</td>
                                <td class="text-center p-0 align-middle" width="70">Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($produtoCases as $produto)
                            <tr>
                                <td class="text-center p-0 align-middle" width="70">{{ $produto->id }}</td>
                                <td class="text-center p-0 align-middle" width="70"><img src="{{ asset("images/{$produto->image}") }}" alt="{{$produto->nome}}" height="70px"/></td>
                                <td class="text-center p-0 align-middle" width="70">{{ $produto->nome }}</td>
                                <td class="text-center p-0 align-middle" width="70">R$ {{number_format($produto->valor, '2', ',', '.')  }}</td>
                                <td class="text-center p-0 align-middle" width="70">{{ $produto->estoque }}</td>
                                <td class="text-center p-0 align-middle" width="70">{{ $produto->vendas }}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('editar.produtos', $produto->id) }}"
                                       class="text-center bold"> @lang('Editar')
                                    </a>
                                    <form action="{{ route('crud.destroy', $produto->id)}}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
