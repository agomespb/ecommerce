@extends('store.store')

@section('sidebar_left')
    @include('store.partial.categories')
@stop

@section('content')

    <div class="features_items">

        <h2 class="title text-center">
            {{ $tag->name }} / Produtos Relacionados
        </h2>

        @include('store.partial.products', ['produtos'=>$produtos])

    </div>

@stop