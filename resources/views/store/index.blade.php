@extends('store.store')

@section('sidebar_left')
    @include('store.categories_partial')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->

            @include('store.products_featured_partial')

        </div><!--features_items-->

        <div class="features_items"><!--recommended-->

            @include('store.products_recommend_partial')

        </div><!--recommended-->
    </div>
@stop