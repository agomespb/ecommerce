
@extends('app')

@section('content')
    <div class="container">

        <h2>Alterar Produto: </h2>
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

        {!! Form::open(['route'=>['update_product', $produto->id], 'method'=>'put']) !!}

        <div class="form form-group">

            {!! Form::label('category_id', 'Categoria:') !!}
            {!! Form::select('category_id', $categorias, $produto->category->id,['class'=>'form-control']) !!}

        </div>

        <div class="form form-group">

            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name',$produto->name,['class'=>'form-control']) !!}

        </div>

        <div class="form form-group">

            {!! Form::label('price', 'Valor:') !!}
            {!! Form::text('price',$produto->price,['class'=>'form-control']) !!}

        </div>

        <div class="form form-group">

            {!! Form::label('description', 'Descrição:') !!}
            {!! Form::textarea('description',$produto->description,['class'=>'form-control']) !!}

        </div>

        <div class="form form-group">

            {!! Form::label('featured', 'Featured?:') !!}
            {!! Form::radio('featured', 1, ($produto->featured)?true:false, ['class' => 'field']) !!} Sim
            {!! Form::radio('featured', 0, (!$produto->featured)?true:false, ['class' => 'field']) !!} Não

            <br/>

            {{--{!! Form::checkbox('featured', $produto->featured, $produto->featured, ['class' => 'field']) !!}--}}

            {!! Form::label('recommend', 'Recomendar:') !!}
            {!! Form::radio('recommend', 1, ($produto->recommend)?true:false, ['class' => 'field']) !!} Sim
            {!! Form::radio('recommend', 0, (!$produto->recommend)?true:false, ['class' => 'field']) !!} Não

            {{--{!! Form::checkbox('recommend', $produto->recommend, $produto->recommend,['class'=>'field']) !!}--}}


        </div>

        <div class="form form-group">

            {!! Form::submit('Salvar Produto', ['class'=>'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}


    </div>
@endsection