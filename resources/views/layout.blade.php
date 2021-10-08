<!DOCTYPE html>
<html lang="{{ str_ireplace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, inital-scale=1">

        <title>WF Store | LARAVEL</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style type="text/css">
            @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

            body{
                margin: 0;
                font-size: .9rem;
                font-weight: 400;
                line-height: 1.6;
                color: #212529;
                text-align: left;
                background-color: #f5f8fa;
            }

            .navbar-laravel{
                box-shadow: 0 2px 4px rgba(0,0,0, .04);
            }

            .navbar-brand, .nav-link, .my-form, .login-form{
                font-family: Nunito, sans-serif;
            }

            .my-form{
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }

            .my-form .row{
                margin-left: 0;
                margin-right: 0;
            }

            .login-form{
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }

            .login-form .row{
                margin-left: 0;
                margin-right: 0;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="#">Bem vindo!</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('registro') }}">Criar conta</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toogle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Loja <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route ('inicio-loja')}}">
                                        Primeira Tela
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        Tela de Filtros
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toogle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Produtos <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route ('adicionar-produto')}}">
                                        Cadastrar Produto
                                    </a>
                                        <a class="dropdown-item" href="{{route ('exibir-produtos')}}">
                                           Exibir produtos
                                        </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toogle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{Auth::user()->name}} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route ('logout')}}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit()">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{route('logout')}}" method="post"
                                          style="display:none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>

        @yield('content')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        @stack('js')

    </body>
</html>
