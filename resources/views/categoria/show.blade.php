
@extends('app')

@section('content')

    <div class="container">

        <h2>Consulta Categoria</h2>
        <hr>
        <a href="{{ URL::route('new_category') }}" class="btn btn-default">Adicionar Categoria</a> |
        <a href="{{ URL::route('categories') }}" class="btn btn-default">Voltar</a>
        <br /><br />

        @if($categoria)

            <p><strong>ID: {{ $categoria->id }} </strong></p>
            <p><strong>Nome: {{ $categoria->name }}</strong></p>
            <p><strong>Descrição:</strong> <br/> <br/><em>{{ $categoria->description }}</em></p>
        @else
            <h2>A Consulta retornou ZERO</h2>
        @endif
    </div>

@endsection