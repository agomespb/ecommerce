@extends('store.store')

@section('cart_content')
    <div class="container">
        <main class="main_content">
            <header class="title-section">
                <h1>Fale Conosco:</h1>

                <p class="tagline">Entraremos em contato o mais breve possível!</p>
            </header>

            <div class="row">
                <form class="form">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name"><span>Nome Completo:</span>
                            <input type="text" class="form-control" id="nome" placeholder="Informe Seu Nome">
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="email"><span>Endereço de E-mail:</span>
                            <input type="email" class="form-control" id="email" placeholder="Informe Seu E-mail">
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="assunto"><span>Sobre o Que Você Quer Falar?</span>
                            <input type="text" class="form-control" id="assunto" placeholder="Assunto:">
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="telefone"><span>Deixe seu Telefone:</span>
                            <input type="tel" class="form-control" id="telefone" placeholder="Telefone:">
                        </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>
                        <span>Fale Aqui:</span>
                        <textarea class="form-control" rows="6" placeholder="Escreva Sua Mensagem:"></textarea>
                    </label>

                    <label>
                        <span>Como encontrou o Site?</span>
                        <select class="form-control">
                            <option>Google</option>
                            <option>Yahoo</option>
                            <option>Bing</option>
                            <option>Indicação</option>
                        </select>
                    </label>

                    <div class="form_action">
                        <input class="btn btn-primary" type="reset" value="Limpar Dados"/>
                        <input class="btn btn-primary" type="submit" value="Enviar Dados"/>
                    </div>
                </div>
                </form>
            </div>

            <div class="clear"></div>

        </main>
        <br/>

        <p></p>

        <p></p><br/><br/>
    </div>

@stop

@section('styles')
    @parent
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@stop