
@extends('app')

@section('content')
    <div class="container">

        <h2>Categorias</h2>
        <hr>
        <a href="{{ URL::route('new_category') }}" class="btn btn-default">Adicionar Categoria</a> <br /><br />
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ação</th>
            </tr>

            @foreach($Categorias as $Categoria)

                <tr>
                    <td>{{ $Categoria->id }}</td>
                    <td>{{ $Categoria->name }}</td>
                    <td>{{ $Categoria->description }}</td>
                    <td>
                        <a href="{{ route('edit_category',['id'=>$Categoria->id] ) }}" class="btn btn-default">Editar</a>
                        <a href="{{ route('show_category',['id'=>$Categoria->id] ) }}" class="btn btn-default">Consultar</a>
                        <a href="{{ route('destroy_category',['id'=>$Categoria->id] ) }}" class="btn btn-default">Excluir</a>
                    </td>
                </tr>

            @endforeach

        </table>

    </div>
@endsection