
@extends('app')

@section('content')
    <div class="container" id="vue">

        <h2>Categorias</h2><hr>

        <a href="{{ URL::route('new_category') }}" class="btn btn-default">Adicionar Categoria</a> <br /><br />

        @if(Session::has('flash_message'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                {{ Session::get('flash_message') }}
            </div>
        @endif

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ação</th>
            </tr>

            @foreach($categorias as $categoria)

                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td width="25%">{{ $categoria->name }}</td>
                    <td width="50%">{{ $categoria->description }}</td>
                    <td>
                        <a href="{{ route('edit_category',['id'=>$categoria->id] ) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></a>
                        <a href="{{ route('show_category',['id'=>$categoria->id] ) }}" class="btn btn-default"><span class="glyphicon glyphicon-search"></a>
                        <a href="{{ route('destroy_category',['id'=>$categoria->id] ) }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"></a>
                    </td>
                </tr>

            @endforeach

        </table>

        {!! $categorias->render() !!}

        {{--//: "Nordeste"cep: "59042-640"complemento: ""ibge: "2408102": "Natal"logradouro: "Rua Batuque": "RN"--}}
<p>
        <input class="form-contro" type="text" name="cep" id="cep" v-model="cep" v-on="keyup:buscar"/>
    <p class="text-danger" style="display: none;" v-show="naoLocalizado"><strong>Endereço não localizado.</strong> Favor forneça manualmente.</p>
        <input class="form-contro" type="text" name="logradouro" id="logradouro" v-el="logradouro" v-model="endereco.logradouro" /><br/><br/>
        <input class="form-contro" type="text" name="bairro" id="bairro" v-model="endereco.bairro" /><br/><br/>
        <input class="form-contro" type="text" name="localidade" id="localidade" v-model="endereco.localidade" /><br/><br/>
        <input class="form-contro" type="text" name="uf" id="uf" v-model="endereco.uf" />
</p>

        <br/><br/><br/><br/>

    </div>
@endsection

@section('scripts')
    @parent

    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/appvuejs.js') }}"></script>

    <script>
        ;(function($)
        {
            'use strict';
            $(document).ready(function()
            {
                $(function(){
                    var url_deletar = "{{ route('destroy_category', ['id'=>null]) }}" + '/';
                    $("a[href*='" + url_deletar + "']").click(function (event) {
                        var categoria_id  = $(this).attr('href').split(url_deletar).pop();
                        var mensagem = "Deseja realmente remover a Categoria com ID " + categoria_id + " da sua loja?";
                        var confirmacao = confirm(mensagem);
                        if (!confirmacao)
                            event.preventDefault();
                    });
                });
            });
        })(window.jQuery);
    </script>

@stop