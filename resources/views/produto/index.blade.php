
@extends('app')

@section('content')
    <div class="container">

        <h2>Produtos</h2>
        <hr>
        <a href="{{ URL::route('new_product') }}" class="btn btn-default">Adicionar Produto</a> <br /><br />

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor R$</th>
                <th>Descrição</th>
                <th>Featured?</th>
                <th>Recomendado</th>
                <th>Ação</th>
            </tr>

            @foreach($Produtos as $Produto)

                <tr>
                    <td>{{ $Produto->id }}</td>
                    <td width="20%">{{ $Produto->name }}</td>
                    <td>{{ number_format($Produto->price, 2, ',', '.') }}</td>
                    <td width="25%">{{ $Produto->description }}</td>
                    <td>{{ ($Produto->featured)?'Sim':'Não' }}</td>
                    <td>{{ ($Produto->recommend)?'Sim':'Não' }}</td>
                    <td>
                        <a href="{{ route('edit_product',['id'=>$Produto->id] ) }}" class="btn btn-default">Editar</a>
                        <a href="{{ route('show_product',['id'=>$Produto->id] ) }}" class="btn btn-default">Consultar</a>
                        <a href="{{ route('destroy_product',['id'=>$Produto->id] ) }}" class="btn btn-default">Excluir</a>
                    </td>
                </tr>

            @endforeach

        </table>

    </div>
@endsection