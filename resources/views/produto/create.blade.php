
@extends('app')

@section('content')
    <div class="container">

        <h2>Novo Produto</h2>
        <hr>

        <a href="{{ URL::route('products') }}" class="btn btn-default">Voltar</a>

        {!! Form::open() !!}

        {!! Form::close() !!}

    </div>
@endsection