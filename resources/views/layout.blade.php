<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/aethesa-icon.png">
    <link rel="stylesheet" href="css/style.css">
    <title>Aethesa</title>
</head>
<body>

    <div class="menu">
        <div class="borda-cima"><img src="images/aethesa-font.png" alt="aethesa fonte"></div>

        <div class="menu-centro">

            <a href="/">
                <img src="images/aethesa-icon.png" alt="logo" class="logo">
            </a>

            <form class="search-box">
                <input type="text" name="pesquisa" placeholder="O que você está procurando?">
                <button class="lupa" type="submit">
                    <img src="images/lupa.png" alt="buscar" id="lupa">
                </button>
            </form>

            <div class="usuario">
                @auth
                <a href="#" class="user-area">
                    <img src="images/user.png" alt="usuario">
                    <span class="entrar-txt">OLÁ, <strong class="nome-limitado">{{ $usuario->name }}</strong></span>
                </a>
                <form method="POST" action="{{ route ('logout') }}" class="user-area">
                    @csrf
                    <button type="submit" class="entrar-txt" style="background: none; border:none;">DESLOGAR</button>
                </form>    
                @else
                <a href="/login" class="user-area">
                    <img src="images/user.png" alt="usuario">
                    <span class="entrar-txt"><strong>ENTRAR</strong> OU <strong>CADASTRAR</strong></span>
                </a>
                @endauth
                

                <img src="images/desejo.png" alt="listaDesejos" onclick="abrirFavoritos()">

                <img src="images/carrinho.png" alt="Carrinho" onclick="abrirCarrinho()">
            </div>
        </div>

        <div class="borda-baixo"></div>
    </div>
    
    <div class="menu-compact">
        <div class="menu-centro" style="height: 100%;"> 
            <a href="/">
                <img src="images/aethesa-font.png" alt="aethesa font" class="logo">
            </a>
            <form action="buscar" class="search-box">
                <input type="text" name="pesquisa" placeholder="O que você está procurando?">
                <button class="lupa" type="submit">
                    <img src="images/lupa.png" alt="buscar">
                </button>
            </form>

            <div class="usuario">
                @auth
                <a href="#" class="user-area">
                    <img src="images/user.png" alt="usuario">
                    <span class="entrar-txt">OLÁ, <strong class="nome-limitado"> {{ $usuario->name }} </strong></span>
                </a>
                <form method="POST" action="{{ route ('logout') }}" class="user-area">
                    @csrf
                    <button type="submit" class="entrar-txt" style="background: none; border:none;">DESLOGAR</button>
                </form>      
                @else
                <a href="/login" class="user-area">
                    <img src="images/user.png" alt="usuario">
                    <span class="entrar-txt"><strong>ENTRAR</strong> OU <strong>CADASTRAR</strong></span>
                </a>
                @endauth
                
                <img src="images/desejo.png" alt="listaDesejos" onclick="abrirFavoritos()">
                <img src="images/carrinho.png" alt="Carrinho" onclick="abrirCarrinho()">
            </div>
        </div>
    
        <div class="linha-fina"></div>
    </div>

    <div class="overlay" id="overlay"></div>

    <!-- Caixa de Favoritos -->
    <div class="caixa-favoritos" id="caixaFavoritos">
        <div class="favoritos-header">
            <h2>Meus Favoritos</h2>
            <button class="btn-fechar-favoritos" onclick="fecharFavoritos()">×</button>
        </div>

        <div class="favoritos-lista" id="listaFavoritos">
            
             
            @auth
            @foreach($favorito as $favoritos)

            <div class="item-favorito">

                <img src=" {{asset($favoritos->image)}}" alt="Produto">
                <div class="item-favorito-info">
                    <h3> {{ $favoritos->name }} </h3>
                    <p> {{ $favoritos->price }} </p>

                    <div class="item-favorito-acoes">
                        <a href="{{url('/removerFavorito/' . $favoritos->product_id) }}" style="text-decoration: 0;">
                            <button class="btn-favorito-acao btn-remover-favorito" title="Remover dos favoritos">🗑️</button>
                        </a>
                        <a href="{{url('/carrinho/' . $favoritos->product_id) }}" style="text-decoration: 0;">
                            <button class="btn-favorito-acao btn-add-carrinho" title="Adicionar ao carrinho">🛒</button>
                        </a>
                    </div>
                </div>
            </div>

            @endforeach
            @else 
            <div class="item-favorito">
                <div class="item-favorito-info">
                    <h3>Faça login para utilizar essa função!</h3>
                </div>
            </div>
            @endauth
            </div>
            

        <div class="favoritos-footer">
            <a href="{{url('/limparFavorito/')}}" style="text-decoration: 0;">
            <button class="btn-limpar-favoritos">🗑️ Limpar Todos os Favoritos</button>
            </a>
        </div>
        </div>
    </div>

    <!-- Caixa de Carrinho -->
    <div class="caixa-carrinho" id="caixaCarrinho">
        <div class="carrinho-header">
            <h2>Meu Carrinho</h2>
            <button class="btn-fechar-carrinho" onclick="fecharCarrinho()">×</button>
        </div>

        <div class="carrinho-lista" id="listaCarrinho">
             
            @auth
            @foreach($carrinho as $carrinhos)
            
            <div class="item-carrinho">
                <div class="item-carrinho-checkbox">
                    <input type="checkbox" checked>
                </div>
                
                <img src=" {{asset($carrinhos->image)}} " alt="Produto">
                <div class='item-carrinho-info'>
                    <h3>{{$carrinhos->name}}   </h3>
                    <p> {{$carrinhos->price}}   </p>
                </div>

                <div class="item-carrinho-acoes">
                    <a href="{{url('/removerCarrinho/' . $carrinhos->product_id) }} " style="text-decoration: 0;">
                        <button class="btn-remover-carrinho" title="Remover do carrinho">×</button>
                    </a>
                </div>
            </div>
            @endforeach
            @else
            <div class="item-carrinho">
                <div class="item-carrinho-info">
                    <h3>Faça login para utilizar essa função!</h3>
                </div>
            </div>
            
            @endauth


        </div>

        <div class="carrinho-footer">
            <div class="carrinho-total">
                <span>Total:</span>
                <span>R$ {{$total}}</span>
            </div>
            <div class="carrinho-footer-acoes">
                <a href="{{url('/limparCarrinho/') }}" style="text-decoration: 0;">
                    <button class="btn-limpar-carrinho">Limpar</button>
                </a>
                <button class="btn-comprar" onclick="finalizarCompra()">💳 Finalizar Compra</button>
            </div>
        </div>
    </div>

                @yield('conteudo')

    <div class="rodape">
        <img src="images/rodape-canto.png" alt="">
        <img src="images/flutuante4.png" alt="Semáforo" class="flutuante-esq">
        <img src="images/flutuante3.png" alt="Placa 30km" class="flutuante-dir fltuante3">

        <div class="conteudo-rodape">
            <img src="images/aethesa-font.png" alt="Aethesa Logo" class="logo-rodape">
            
            <div class="info-rodape">
                <p>&copy; 2025 Aethesa. Todos os direitos reservados.</p>
                <div class="links-rodape">
                    <a href="https://www.instagram.com/aethesa_/">Nos Apoie nas Redes Sociais</a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/aethesa.js"></script>
</body>
</html>