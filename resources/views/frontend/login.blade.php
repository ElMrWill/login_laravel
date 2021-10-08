@extends('frontend.layout')

@section('title')
   Faça seu login! | WF Store
@endsection


@section('content')
<div class="login">
    <div class="login__table">
        <div class="login__content">
            <h1>Faça seu login!</h1>
            <form action="#" method="post">
            @csrf
                <div class="login__field">
                    <label for="email "class="label_login"></label>
                    <input type="email" id="email" placeholder="E-mail" name="email" class="email_login" autofocus required>
                </div>
                <div class="login__field">
                    <label for="senha "class="label_login"></label>
                    <input type="password" id="senha" placeholder="Senha" name="senha" class="email_login" autofocus required>
                </div>
                <div class="login__button">
                    <button type="submit" class="button_login">
                        Entrar
                    </button>
                    <a href="{{ route('registrar.cliente') }}" class="registrar">Criar conta</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 



