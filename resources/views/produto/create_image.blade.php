
@extends('app')

@section('content')
    <div class="container">

        <h2>Upload de Imagem</h2>
        <hr>

        <a href="{{ URL::route('products_images', $produto->id) }}" class="btn btn-default">Voltar</a>

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

        {!! Form::open(['route'=>['products_images_store', $produto->id], 'method'=>'post', 'files' => true ]) !!}

        <div class="form form-group">

            {!! Form::label('image', 'Imagem:') !!}
            {!! Form::file('image', null,['class'=>'form-control']) !!}

        </div>

        <div class="form form-group">

            {!! Form::submit('Upload da Imagem', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

    </div>
@endsection