
@extends('app')

@section('content')

    <div class="container">

        <h2>Consulta Categoria</h2>
        <hr>
        <a href="{{ URL::route('new_product') }}" class="btn btn-default">Adicionar Produto</a> |
        <a href="{{ URL::route('products') }}" class="btn btn-default">Voltar</a>
        <br /><br />

        @if($Produto)

            <p><strong>ID: </strong> {{ $Produto->id }} </p>
            <p><strong>Nome:</strong> {{ $Produto->name }}</p>
            <p><strong>Valor:</strong>R$ {{ number_format($Produto->price, 2, ',', '.') }}</p>
            <p><strong>Descrição:</strong> <br/> <br/><em>{{ $Produto->description }}</em></p>
        @else
            <h2>A Consulta retornou ZERO</h2>
        @endif
    </div>

@endsection