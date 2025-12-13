
const banners = document.querySelectorAll('.banners img[class^="banner"]');
const bolinhas = document.querySelectorAll('.indicadores .bolinha');


if (banners.length > 0) {
    let indiceAtual = 0;

    function mostrarBanner(index) {
        banners.forEach(banner => banner.classList.remove('ativo'));
        bolinhas.forEach(bolinha => bolinha.classList.remove('ativo'));

        banners[index].classList.add('ativo');
        bolinhas[index].classList.add('ativo');

        indiceAtual = index;
    }


    window.avancarBanner = function() {
        let proximoIndex = indiceAtual + 1;
        if (proximoIndex >= banners.length) proximoIndex = 0;
        mostrarBanner(proximoIndex);
    }

    window.voltarBanner = function() {
        let anteriorIndex = indiceAtual - 1;
        if (anteriorIndex < 0) anteriorIndex = banners.length - 1;
        mostrarBanner(anteriorIndex);
    }

    window.irParaBanner = function(index) {
        mostrarBanner(index);
    }


    mostrarBanner(0);
}

const menuOriginal = document.querySelector('.menu');
const menuCompacto = document.querySelector('.menu-compact');

if (menuOriginal && menuCompacto) {
    function checarScroll() {
        const alturaMenuOriginal = menuOriginal.offsetHeight;
        if (window.scrollY > alturaMenuOriginal) {
            menuCompacto.classList.add('visivel');
        } else {
            menuCompacto.classList.remove('visivel');
        }
    }
    window.addEventListener('scroll', checarScroll);
}


const overlay = document.getElementById('overlay');
const caixaFavoritos = document.getElementById('caixaFavoritos');
const caixaCarrinho = document.getElementById('caixaCarrinho');

if (overlay && caixaFavoritos && caixaCarrinho) {


    function _fecharFavoritos() {
        caixaFavoritos.classList.remove('aberta');
        overlay.classList.remove('ativo');
    }

    function _fecharCarrinho() {
        caixaCarrinho.classList.remove('aberta');
        overlay.classList.remove('ativo');
    }


    window.abrirFavoritos = function() {
        _fecharCarrinho();
        caixaFavoritos.classList.add('aberta');
        overlay.classList.add('ativo');
    }

    window.fecharFavoritos = _fecharFavoritos;

    window.abrirCarrinho = function() {
        _fecharFavoritos();
        caixaCarrinho.classList.add('aberta');
        overlay.classList.add('ativo');
    }

    window.fecharCarrinho = _fecharCarrinho;

    window.finalizarCompra = function() {
        const checkboxes = document.querySelectorAll('.item-carrinho-checkbox input:checked');
        if (checkboxes.length === 0) {
            alert('Selecione pelo menos um produto para comprar!');
            return;
        }
        alert(`Obrigado por escolher Aethesa!`);
        window.location.replace("#");
    }


    overlay.addEventListener('click', () => {
        _fecharFavoritos();
        _fecharCarrinho();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            _fecharFavoritos();
            _fecharCarrinho();
        }
    });
}

const btnCadastrar = document.querySelector('.btn-cadastrar');
if (btnCadastrar) {
    btnCadastrar.classList.add('loading');
}

setInterval(avancarBanner, 5000);