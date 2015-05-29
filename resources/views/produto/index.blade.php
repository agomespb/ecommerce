@extends('app')

@section('content')
    <div class="container">

        <h2>Produtos</h2><hr>

        <a href="{{ URL::route('new_product') }}" class="btn btn-default">Adicionar Produto</a> <br/><br/>

        @if(Session::has('flash_message'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <strong>Ops!</strong> {{ Session::get('flash_message') }}
            </div>
        @endif

        <table class="table">
            <tr>
                <th>ID</th>
                <th>
                    <small>Nome</small>
                </th>
                <th>
                    <small>Valor R$</small>
                </th>
                <th class="text-center">
                    <small>Descrição</small>
                </th>
                <th class="text-center">
                    <small>Destaque</small>
                </th>
                <th>
                    <small>Recomendado</small>
                </th>
                <th>
                    <small>Categoria</small>
                </th>
                <th>
                    <small>Ação</small>
                </th>
            </tr>

            @foreach($produtos as $produto)

                <tr>
                    <td>{{ $produto->id }}</td>
                    <td width="20%">
                        <small>{{ $produto->name }}</small>
                    </td>
                    <td>
                        <small>{{ number_format($produto->price, 2, ',', '.') }}</small>
                    </td>
                    <td width="25%">
                        <small>{{ $produto->description }}</small>
                    </td>
                    <td class="text-center">
                        <small>{{ ($produto->featured)?'Sim':'Não' }}</small>
                    </td>
                    <td class="text-center">
                        <small>{{ ($produto->recommend)?'Sim':'Não' }}</small>
                    </td>
                    <td>
                        <small>{{ $produto->category->name }}</small>
                    </td>
                    <td>
                        <a href="{{ route('edit_product',['id'=>$produto->id] ) }}" class="btn btn-default"><span
                                    class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ route('show_product',['id'=>$produto->id] ) }}" class="btn btn-default"><span
                                    class="glyphicon glyphicon-search"></span></a>
                        <a href="{{ route('destroy_product',['id'=>$produto->id] ) }}" class="btn btn-default">
                            <span class="glyphicon glyphicon-remove">
                        </a>
                        <a href="{{ route('products_images',['id'=>$produto->id] ) }}" class="btn btn-default">
                            <span class="glyphicon glyphicon-camera">
                        </a>
                    </td>
                </tr>

            @endforeach

        </table>

        {!! $produtos->render() !!}

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
                    var url_deletar = "{{ route('destroy_product', ['id'=>null]) }}" + '/';
                    $("a[href*='" + url_deletar + "']").click(function (event) {
                        var produto_id  = $(this).attr('href').split(url_deletar).pop();
                        var mensagem = "Deseja realmente remover o Produto com ID " + produto_id + " da sua loja?";
                        var confirmacao = confirm(mensagem);
                        if (!confirmacao)
                            event.preventDefault();
                    });
                });
            });
        })(window.jQuery);
    </script>
@stop
