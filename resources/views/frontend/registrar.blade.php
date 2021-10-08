@extends('frontend.layout')

@section('title')
   Crie sua conta gratuitamente | WF Store
@endsection


@section('content')
<div class="login">
    <div class="login__table">
        <div class="login__content">
            <h1>Crie sua conta:</h1>
            <form action="{{ route('cria.cliente')}}" method="POST">
            @csrf
                <div class="login__field">
                    <label for="nome" class="label_login"></label>
                    <input type="text" id="nome" placeholder="Nome Completo" name="nome" class="email_login" autofocus required>
                </div>
                <div class="login__field">
                    <label for="email" class="label_login"></label>
                    <input type="email" id="email" placeholder="E-mail" name="email" class="email_login" autofocus required>
                </div>
                <div class="login__field">
                    <label for="senha" class="label_login"></label>
                    <input type="password" id="senha" placeholder="Senha" name="senha" class="email_login" autofocus required>
                </div>
                <div class="login__field">
                    <label for="tel" class="label_login"></label>
                    <input type="number" id="tel" placeholder="Telefone somente numeros" name="tel" class="email_login" autofocus required>
                </div>
                <div class="login__field">
                    <label for="rua" class="label_login"></label>
                    <input type="text" id="rua" placeholder="Nome da rua" name="rua" class="email_login" autofocus required>
                </div>
                <div class="login__field">
                    <label for="numero" class="label_login"></label>
                    <input type="number" id="numero" placeholder="Numero da casa" name="numero" class="email_login" autofocus required>
                </div>
                <div class="login__field">
                    <label for="bairro" class="label_login"></label>
                    <input type="text" id="bairro" placeholder="Nome do bairro" name="bairro" class="email_login" autofocus required>
                </div>
                <div class="login__field">
                    <label for="cidade" class="label_login"></label>
                    <input type="text" id="cidade" placeholder="Nome da cidade" name="cidade" class="email_login" autofocus required>
                </div>
                <div class="login__field">
                    <label for="cep" class="label_login"></label>
                    <input type="number" id="cep" placeholder="Cep da Rua" name="cep" class="email_login" autofocus required>
                </div>
                <div class="login__field">
                    <label for="cpf" class="label_login"></label>
                    <input type="number" id="cpf" placeholder="CPF (Somente numeros)" name="cpf" class="email_login" autofocus required>
                </div>
                <div class="login__button">
                    <button type="submit" class="button_login">
                        Entrar
                    </button>
                    <a href="/" class="registrar">Criar conta</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 



