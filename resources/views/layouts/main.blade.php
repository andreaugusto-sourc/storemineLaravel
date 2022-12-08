<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" href="/images/icon.webp">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/main.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>
<div class="container">

<header class="d-flex flex-column w-100">

<div class="navbar">
    
    <img src="/images/logo.png" class="logo p-1">

    <a href="/" class="logo-texto p-1" translate="no"><span>Store</span>Mine</a>

    <form action="/" method="get">
    <div class="d-flex">
    <input type="search" name="busca" id="input-pesquisa" placeholder="O que você está procurando?">
    <button class="icon-pesquisa" type="submit"><ion-icon name="search-outline"></ion-icon></button>
    </div>
    </form>

    <div class="menu-section">    

        <div class="menu-toggle">
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
        </div>

        <nav>
            
        <li><img src="/images/carrinho.png" class="imagens-link p-1"> <a href="">Carrinho</a></li>

        <li><img src="/images/cadastro.png" class="imagens-link p-1"> <a href="">Cadastro</a></li>

        </nav>
   
    </div>

</div>

<ul>
    <li class="item-ul">Roupas</li>
    <li class="item-ul">Pelúcias</li>
    <li class="item-ul">Acessórios</li>
    <li class="item-ul">Diversos</li>
</ul>

</header>

    @yield('content')
    
</div>

<footer>

<div id="caminhos-footer">
    <a href="" class="item-rodape">Sobre</a>
    <a href="" class="item-rodape">Contato</a>
    <a href="" class="item-rodape">Privacidade</a>
    <a href="dashboard" class="item-rodape">Administração</a>
</div>

<div id="redes-sociais">
    <a>"Nosso" instagram:</a>
    <a href="https://www.instagram.com/andremartins1033/"> <ion-icon class="redes-icons" name="logo-instagram"></ion-icon> </a>
    <a>Acesse o projeto:</a>
    <a href="https://github.com/andreaugusto-sourc/storemine"> <ion-icon class="redes-icons" name="logo-github"></ion-icon> </a>
</div>

</footer>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>