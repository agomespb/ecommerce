@extends('store.store')

@section('sidebar_left')
    @include('store.partial.categories')
@stop

@section('content')

    <div class="features_items"><!--features_items-->

        <h2 class="title text-center">
            {{ (isset($category_id)) ? $categorias[$category_id] : '' }} Em Destaque
        </h2>
        @include('store.partial.products', ['produtos'=>$produtosEmDestaque])

    </div><!--features_items-->

    <div class="features_items"><!--recommended-->

        <h2 class="title text-center">
            {{ (isset($category_id)) ? $categorias[$category_id] : '' }} Recomendados
        </h2>
        @include('store.partial.products', ['produtos'=>$produtosRecomendados])

    </div><!--recommended-->

@stop