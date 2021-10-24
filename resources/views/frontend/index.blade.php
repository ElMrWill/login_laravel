@extends('frontend.layout')

@section('title')
    WF Store | A loja da WF em Laravel
@endsection


@section('content')
    @if(session('success'))
        <div class="message">
            <h5>{{ session('success') }}</h5>
        </div>
    @endif
    <div class="hero">
        <div class="py-5">
            <div class="hero__container">
                        @foreach($produtoPrincipal as $produto)
                            <div class="col-md-3">
                                <div class="hero__card">
                                    <img src="{{ asset("images/{$produto->image}") }}" alt="{{$produto->nome}}" height="166px"/>
                                    <div class="card-body">
                                        <h5>{{$produto->nome}}</h5>
                                        <p>R$ {{number_format($produto->valor, 2, ',', '.')}}</p>
                                    </div>
                                    <div class="bottom">
                                        <a href="{{route ('add-carrinho', $produto->id)}}">ADICIONAR AO CARRINHO</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
            </div>
        </div>
    </div>

@endsection
