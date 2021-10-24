@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Cadastrar novo usuário</div>
                        <div class="card-body">

                            <form action="{{route('registra.user')}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" name="name" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-mail</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label for="cod" class="col-md-4 col-form-label text-md-right">Codigo de autorização</label>
                                        <div class="col-md-6">
                                            <input type="text" id="cod" class="form-control" value="{{ $numeroControle }}" name="cod" required readonly>
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nivel" class="col-md-4 col-form-label text-md-right"></label>
                                    <select name="nivel" class="form-select mt-3" required>
                                        <option selected disabled value="">Função</option>
                                        <option value="2">Vendedor</option>
                                        <option value="3">Gerente</option>
                                        <option value="4">Criador de Conteudo</option>
                                    </select>
                                    <div class="valid-feedback">Categoria selecionada!</div>
                                    <div class="invalid-feedback">Informe a categoria do produto!</div>
                            </div>
                                

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Cadastrar
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
