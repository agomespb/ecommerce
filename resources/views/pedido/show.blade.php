
@extends('app')

@section('content')

    <div class="container">

        <h2>Consulta Categoria</h2>
        <hr>
        <a href="{{ URL::route('new_product') }}" class="btn btn-default">Adicionar Produto</a> |
        <a href="{{ URL::route('products') }}" class="btn btn-default">Voltar</a>
        <br /><br />

        @if($produto)

            <p><strong>ID: </strong> {{ $produto->id }} </p>
            <p><strong>Nome:</strong> {{ $produto->name }}</p>
            <p><strong>Valor:</strong>R$ {{ number_format($produto->price, 2, ',', '.') }}</p>
            <p><strong>Descrição:</strong> <br/> <br/><em>{{ $produto->description }}</em></p>
        @else
            <h2>A Consulta retornou ZERO</h2>
        @endif
    </div>

@endsection