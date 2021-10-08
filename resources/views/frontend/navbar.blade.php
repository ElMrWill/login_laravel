<header>
    <div class="container">
        <a href="{{ asset('/') }}" aria-label="Logo da WF">
            <img src="{{ URL::asset('/images/Logotop.png') }}" alt="Logo da WF" width="105px" class="container__logo"/>
        </a>
        <div class="header-menu">
            <nav class="desktop-menu">
                <ul>
                    <li><a href="#" class="desktop-menu__link active">Início</a></li>
                    <li><a href="#" class="desktop-menu__link">Sobre nós</a></li>
                    <li><a href="#" class="desktop-menu__link">Produtos</a></li>
                    <li><a href="#" class="desktop-menu__link">Categorias</a></li>
                    <li><a href="#" class="desktop-menu__link">Contato</a></li>
                    <li><a href="#" class="desktop-menu__button">Mapa</a></li>
                    <li><a href="#" class="icones-menu"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="#" class="icones-menu"><i class="fas fa-users"></i></a></li>
                </ul>
            </nav>
        </div>
        <div class="header-login">
            <a href="{{ asset('/') }}">Carrinho</a>
            <a href="{{ asset('/') }}">Login</a>
        </div>
    </div>
</header>

