
@extends('app')

@section('content')
    <div class="container">

        <h2>Nova Categoria</h2>
        <hr>

        <a href="{{ URL::route('categories') }}" class="btn btn-default">Voltar</a>

        <hr>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <hr>
        @endif

        {!! Form::open(['route'=>'store_category']) !!}

        <div class="form form-group">

            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}

        </div>

        <div class="form form-group">

            {!! Form::label('description', 'Descrição:') !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}

        </div>

        <div class="form form-group">

            {!! Form::submit('Inserir Categoria', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

    </div>
@endsection