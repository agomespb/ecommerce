@extends('app')

@section('content')
    <div class="container">

        <h2>Usuarios</h2>
        <hr>
        <a href="{{ route('new_user') }}" class="btn btn-default">Adicionar Usuario</a> <br/><br/>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>
                    <small>Nome</small>
                </th>
                <th>
                    <small>Email</small>
                </th>
                <th>
                    <small>Ação</small>
                </th>

            </tr>

            @foreach($Usuarios as $Usuario)

                <tr>
                    <td>{{ $Usuario->id }}</td>
                    <td>
                        <small>{{ $Usuario->name }}</small>
                    </td>
                    <td>
                        <small>{{ $Usuario->email }}</small>
                    </td>

                    <td>
                        <a href="{{ route('edit_user',['id'=>$Usuario->id] ) }}" class="btn btn-default"><span
                                    class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ route('show_user',['id'=>$Usuario->id] ) }}" class="btn btn-default"><span
                                    class="glyphicon glyphicon-search"></span></a>
                        <a href="{{ route('destroy_user',['id'=>$Usuario ->id] ) }}" class="btn btn-default"><span
                                    class="glyphicon glyphicon-remove"> </a>
                    </td>
                </tr>

            @endforeach

        </table>

        {!! $Usuarios->render() !!}

    </div>
@endsection

@section('libjs')

    <script>

        $(function(){

        // variável para conter a url deletar
        var url_deletar = '{{ route('destroy_user', null) }}' + '/';

        // qualquer link que tiver a url deletar vai sofrer um evento quando for clicada
        $("a[href*='" + url_deletar + "']").click(function (event) {

            // variável contendo o id referente ao botão clicado
            var usuario_id  = $(this).attr('href').split(url_deletar).pop();

            // variável contendo mensagem da janela
            var mensagem = "Deseja realmente continuar com a exclusão do Usuário de ID: " + usuario_id + " ?";

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

