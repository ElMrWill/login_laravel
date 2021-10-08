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
        <button class="button mobile-nav-close"></button>
        <button class="button" id="MobileMenuBTN" aria-label="Toggle Menu" aria-expanded="false"
        aria-controls="mobileMenu">
               <img src="src/images/menu.svg" alt="Menu Móvel" width="16">
           </button>
    </div>
</header>

<nav class="menu-mobile" id="mobileMenu">
    <button class="button mobile-nav-close"></button>
    <ul>
        <li><a href="#" class="desktop-menu__link active">Início</a></li>
        <li><a href="#" class="desktop-menu__link">Link 1</a></li>
        <li><a href="#" class="desktop-menu__link">Link 2</a></li>
        <li><a href="#" class="desktop-menu__link">Link 3</a></li>
        <li><a href="#" class="desktop-menu__link">Link 4</a></li>
    </ul>
</nav>