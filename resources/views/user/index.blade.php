@extends('app')

@section('content')
    <div class="container">

        <h2>Usuarios</h2>
        <hr>
        <a href="{{ route('new_user') . $page }}" class="btn btn-default">Adicionar Usuario</a> <br/><br/>

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

            @foreach($usuarios as $usuario)

                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>
                        <small>{{ $usuario->name }}</small>
                    </td>
                    <td>
                        <small>{{ $usuario->email }}</small>
                    </td>

                    <td>
                        <a href="{{ route('edit_user',['id'=>$usuario->id] ) }}" class="btn btn-default"><span
                                    class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ route('show_user',['id'=>$usuario->id] ) . $page }}" class="btn btn-default"><span
                                    class="glyphicon glyphicon-search"></span></a>
                        <a href="{{ route('destroy_user',['id'=>$usuario ->id] ) }}" class="btn btn-default"><span
                                    class="glyphicon glyphicon-remove"> </a>
                    </td>
                </tr>

            @endforeach

        </table>

        {!! $usuarios->render() !!}

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
                    var url_deletar = "{{ route('destroy_user', ['id'=>null]) }}" + '/';
                    $("a[href*='" + url_deletar + "']").click(function (event) {
                        var user_id  = $(this).attr('href').split(url_deletar).pop();
                        var mensagem = "Deseja realmente remover o Usuário com ID " + user_id + " da sua loja?";
                        var confirmacao = confirm(mensagem);
                        if (!confirmacao)
                            event.preventDefault();
                    });
                });
            });
        })(window.jQuery);
    </script>
@stop