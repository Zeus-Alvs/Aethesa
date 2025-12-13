@extends('layout')

@section('conteudo')

<div class="pagina-cadastro">
            <div class="card-cadastro">
                <div class="header-cadastro">
                    <h2>Bem-vindo(a) de volta</h2>
                    <p>Faça login para acessar sua conta</p>
                </div>

                <form method="POST" action="/login" class="form-grid-cadastro form-login">
                    @csrf
                    <div class="coluna-form">
                        <div class="grupo-input">
                            <label>Email</label>
                            <input type="email" name="email" class="input-padrao" placeholder="seu@email.com" required>
                        </div>

                        <div class="grupo-input">
                            <label>Senha</label>
                            <input type="password" name="password" class="input-padrao" placeholder="********" required>
                        </div>

                    </div>

                    <div class="area-btn-cadastro">
                        <button type="submit" class="btn-cadastrar">Entrar</button>
                        <a href="/register" class="link-voltar">Criar nova conta</a>
                    </div>

                </form>
            </div>
        </div>

@endsection