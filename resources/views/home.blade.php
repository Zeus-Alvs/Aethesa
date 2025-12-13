@extends('layout')

@section('conteudo')
    <img src="images/placa1.png" alt="placaflutuante" class="flutuante1">

    <div class="banners">
        <button class="seta" onclick="voltarBanner()">
            <img src="images/seta.png" alt="seta">
        </button>    

        <img src="images/banner1.png" alt="banner1" class="banner1 ativo">
        <img src="images/banner2.png" alt="banner2" class="banner2">
        <img src="images/banner3.png" alt="banner3" class="banner3">
        
        <div class="indicadores">
            <img src="images/bolinha1.png" class="bolinha" onclick="irParaBanner(0)">
            <img src="images/bolinha2.png" class="bolinha" onclick="irParaBanner(1)">
            <img src="images/bolinha3.png" class="bolinha" onclick="irParaBanner(2)">
        </div>
        <button class="seta" onclick="avancarBanner()">
            <img src="images/seta.png" alt="seta" id="seta2">
        </button>
    </div>

    <div class="rodape-banner">
        <div class="frete">
            <span><strong>FRETE GRÁTIS</strong></span>
            <span>acima de R$ 279</span>
        </div>
            
        <div>
            <span><strong>CUPONS DE DESCONTO</strong></span>
            <span>Aproveite</span>
        </div>

        <div>
            <span>DESCONTO DE <strong>1º COMPRA</strong></span>
            <span>Pagando com pix ou a vista</span>
        </div>
    </div>

    <section class="secao-destaques">
        <div class="conteudo-central">
            <h1>DESTAQUES</h1>
        
            <div class="vitrine">
                <img src="images/seta.png" alt="Próximo" class="seta seta-esq">

                @foreach($destaques as $produto)
                <div class='card-produto'>
                     
                    @auth
                        <a href="{{url('/favoritar/' . $produto->id) }}">
                    @else
                        <a href='#' onclick='alert("Faça login para utilizar essa função"); return false;''>
                    @endauth
                    
                        <img src='images/desejo.png' alt='Favoritar' class='btn-desejo'>
                    </a>

                    
                    @auth
                        <a href="{{url('/carrinho/' . $produto->id) }}">
                    @else
                        <a href='#' onclick='alert("Faça login para utilizar essa função"); return false;'>
                    @endauth
                    
                        <img src='{{asset($produto->image)}}' alt='produto' class='foto-produto'>
                    </a>
                </div>
                @endforeach

                <img src="images/seta.png" alt="Próximo" class="seta seta-dir">
            </div>
        </div>
    </section>
    <div class="linha-grossa"></div>
    <img src="images/flutuante2.png" alt="flutuante2" class="flutuante2">
    
    
    <section class="secao-novidades">
    <img src="images/flutuante5.png" alt="flutuante5" class="flutuante5">
    <div class="conteudos">
        
        <div class="vitrine-rolante">

            @foreach ($novidades as $produto)
                <div class="item-novidade">
                    @auth
                        <a href="{{url('/favoritar/' . $produto->id) }}" class="btn-favorito-novidade">
                            <img src="images/desejo.png" alt="Favoritar">
                        </a>
                        <a href="{{url('/carrinho/' . $produto->id) }}">
                            <img src="{{asset($produto->image)}}" alt="{{$produto->name}}" class="img-novidade">
                        </a>
                    
                    @else
                        <a href="#" onclick="alert('Faça login para utilizar essa função'); return false;" class="btn-favorito-novidade">
                            <img src="images/desejo.png" alt="Favoritar">
                        </a>
                        <a href="#" onclick="alert('Faça login para utilizar essa função'); return false;">
                            <img src="{{asset($produto->image)}}" alt="{{$produto->name}}" class="img-novidade">
                        </a>
                    @endauth
                </div>
            @endforeach

            @foreach ($novidades as $produto)
                <div class="item-novidade">
                    @auth
                        <a href="{{url('/favoritar/' . $produto->id) }}" class="btn-favorito-novidade">
                            <img src="images/desejo.png" alt="Favoritar">
                        </a>
                        <a href="{{url('/carrinho/' . $produto->id) }}">
                            <img src="{{asset($produto->image)}}" alt="{{$produto->name}}" class="img-novidade">
                        </a>
                    
                    @else
                        <a href="#" onclick="alert('Faça login para utilizar essa função'); return false;" class="btn-favorito-novidade">
                            <img src="images/desejo.png" alt="Favoritar">
                        </a>
                        <a href="#" onclick="alert('Faça login para utilizar essa função'); return false;">
                            <img src="{{asset($produto->image)}}" alt="{{$produto->name}}" class="img-novidade">
                        </a>
                    @endauth
                </div>
            @endforeach
        </div>
    </div>
    </section>
    
@endsection