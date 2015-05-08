
@extends('app')

@section('content')

    <div class="container">

        <h2>Consulta Categoria</h2>
        <hr>
        <a href="{{ URL::route('new_category') }}" class="btn btn-default">Adicionar Categoria</a> |
        <a href="{{ URL::route('categories') }}" class="btn btn-default">Voltar</a>
        <br /><br />

        @if($Categoria)

            <p><strong>ID: {{ $Categoria->id }} </strong></p>
            <p><strong>Nome: {{ $Categoria->name }}</strong></p>
            <p><strong>Descrição:</strong> <br/> <br/><em>{{ $Categoria->description }}</em></p>
        @else
            <h2>A Consulta retornou ZERO</h2>
        @endif
    </div>

@endsection