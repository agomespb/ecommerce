
@extends('app')

@section('content')
    <div class="container">

        <h2>Novo Produto</h2>
        <hr>

        <a href="{{ URL::route('products') }}" class="btn btn-default">Voltar</a>

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

        {!! Form::open(['route'=>'store_product']) !!}

        <div class="form form-group">

            {!! Form::label('category_id', 'Categoria:') !!}
            {!! Form::select('category_id', $Categorias,null,['class'=>'form-control']) !!}

        </div>

        <div class="form form-group">

            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}

        </div>

        <div class="form form-group">

            {!! Form::label('price', 'Valor:') !!}
            {!! Form::text('price',null,['class'=>'form-control']) !!}

        </div>

        <div class="form form-group">

            {!! Form::label('description', 'Descrição:') !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}

        </div>

        <div class="form form-group">

            {!! Form::label('featured', 'Featured?:') !!}
            {!! Form::radio('featured', 1, null, ['class' => 'field', 'required']) !!} Sim
            {!! Form::radio('featured', 0, null, ['class' => 'field', 'required']) !!} Não

            <br/>

            {{--{!! Form::checkbox('featured', $Produto->featured, $Produto->featured, ['class' => 'field']) !!}--}}

            {!! Form::label('recommend', 'Recomendar:') !!}
            {!! Form::radio('recommend', 1, null, ['class' => 'field', 'required']) !!} Sim
            {!! Form::radio('recommend', 0, null, ['class' => 'field', 'required']) !!} Não

            {{--{!! Form::checkbox('recommend', $Produto->recommend, $Produto->recommend,['class'=>'field']) !!}--}}


        </div>

        <div class="form form-group">

            {!! Form::submit('Inserir Produto', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}

    </div>
@endsection