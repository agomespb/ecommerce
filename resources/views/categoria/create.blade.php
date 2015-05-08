
@extends('app')

@section('content')
    <div class="container">

        <h2>Nova Categoria</h2>
        <hr>

        <a href="{{ URL::route('categories') }}" class="btn btn-default">Voltar</a>

        {!! Form::open() !!}

        {!! Form::close() !!}

    </div>
@endsection