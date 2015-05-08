
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
                <th>Ação</th>
            </tr>

            @foreach($Produtos as $Produto)

                <tr>
                    <td>{{ $Produto->id }}</td>
                    <td>{{ $Produto->name }}</td>
                    <td>{{ number_format($Produto->price, 2, ',', '.') }}</td>
                    <td>{{ $Produto->description }}</td>
                    <td>
                        <a href="{{ URL::route('show_product',['id'=>$Produto->id] ) }}" class="btn btn-default">Consultar</a>
                    </td>
                </tr>

            @endforeach

        </table>

    </div>
@endsection