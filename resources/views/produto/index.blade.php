@extends('app')

@section('content')
    <div class="container">

        <h2>Produtos</h2>
        <hr>
        <a href="{{ URL::route('new_product') }}" class="btn btn-default">Adicionar Produto</a> <br/><br/>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>
                    <small>Nome</small>
                </th>
                <th>
                    <small>Valor R$</small>
                </th>
                <th>
                    <small>Descrição</small>
                </th>
                <th>
                    <small>Featured?</small>
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

            @foreach($Produtos as $Produto)

                <tr>
                    <td>{{ $Produto->id }}</td>
                    <td width="20%">
                        <small>{{ $Produto->name }}</small>
                    </td>
                    <td>
                        <small>{{ number_format($Produto->price, 2, ',', '.') }}</small>
                    </td>
                    <td width="25%">
                        <small>{{ $Produto->description }}</small>
                    </td>
                    <td>
                        <small>{{ ($Produto->featured)?'Sim':'Não' }}</small>
                    </td>
                    <td>
                        <small>{{ ($Produto->recommend)?'Sim':'Não' }}</small>
                    </td>
                    <td>
                        <small>{{ $Produto->Category['name'] }}</small>
                    </td>
                    <td>
                        <a href="{{ route('edit_product',['id'=>$Produto->id] ) }}" class="btn btn-default"><span
                                    class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ route('show_product',['id'=>$Produto->id] ) }}" class="btn btn-default"><span
                                    class="glyphicon glyphicon-search"></span></a>
                        <a href="{{ route('destroy_product',['id'=>$Produto->id] ) }}" class="btn btn-default"><span
                                    class="glyphicon glyphicon-remove"></a>
                    </td>
                </tr>

            @endforeach

        </table>

        {!! $Produtos->render() !!}

    </div>
@endsection

@section('libjs')

    <script>

        $(function(){

        // variável para conter a url deletar
        var url_deletar = "/destroy";

        // qualquer link que tiver a url deletar vai sofrer um evento quando for clicada
        $("a[href*='" + url_deletar + "']").click(function (event) {

            // variável contendo o id referente ao botão clicado
            var contato_id  = $(this).attr('href').split(url_deletar).pop();

            // variável contendo mensagem da janela
            var mensagem = "Deseja realmente continuar com a exclusão?";

            // variável com resposta da mensagem colocada na janela
            var confirmacao = confirm(mensagem);

            // se a confirmação for false o fluxo é interrompido
            if (!confirmacao)
                // elimar o evendo do botão clicado
                event.preventDefault();
            });
        });

    </script>

@endsection

