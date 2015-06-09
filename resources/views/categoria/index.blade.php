
@extends('app')

@section('content')
    <div class="container">

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

        <br/><br/><br/><br/>

    </div>
@endsection

@section('scripts')
    @parent

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