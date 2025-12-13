@extends('layout')

    

@section('conteudo')
<div class="pagina-cadastro">

    <div class="card-cadastro">
        <div class="header-cadastro">
            <h2>Crie sua conta</h2>
            <p>Preencha os dados abaixo para se registrar.</p>
        </div>

        @if ($errors->any())
            <div class="msg-erro-login">
                ⚠️ 
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/register" enctype="multipart/form-data" class="form-grid-cadastro">
            @csrf
            <div class="coluna-form">
                <h3 class="titulo-secao-form">Dados de Acesso</h3>
                
                <div class="grupo-input">
                    <label>Nome Completo</label>
                    <input type="text" name="name" class="input-padrao">
                </div>

                <div class="grupo-input">
                    <label>Email</label>
                    <input type="email" name="email" class="input-padrao">
                </div>

                <div class="grupo-input">
                    <label>Senha</label>
                    <input type="password" name="password" class="input-padrao">
                </div>

                <div class="grupo-input">
                    <label>Confirme a Senha</label>
                    <input type="password" name="password_confirmation" class="input-padrao">
                </div>
            </div>


            <div class="area-btn-cadastro">
                <button type="submit" class="btn-cadastrar">Finalizar Cadastro</button>
                <a href="/login" class="link-voltar">Já tenho conta</a>
            </div>

        </form>
    </div>
</div>
@endsection