@extends('layout')

@section('content')
    <main  class="login-form">
        <div class="continer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Área administrativa!</div>
                        <div class="card-body">
                            <form action="{{ route('login.post') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                                    <input type="text" id="email" class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger"> Erro! </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
                                    <input type="password" id="password" class="form-control" name="password" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger"> Erro! </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="cod" class="col-md-4 col-form-label text-md-right">Código de autorização</label>
                                    <input type="text" id="cod" class="form-control" name="cod" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger"> Erro! </span>
                                    @endif
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Entrar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
