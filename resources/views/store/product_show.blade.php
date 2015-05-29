@extends('store.store')

@section('sidebar_left')
    @include('store.partial.categories')
@stop

@section('content')

    <h2 class="title text-center">{{ trim($produto->category->name) . ' / ' . $produto->name }}</h2>
    <h4 class="text-center">{{ trim($produto->description) }}</h4>

    <div class="col-sm-7">
        <div class="product_images">

            <div class="cover">
                @if( count($produto->images) )
                    <img src="{{ url('uploads/'.$produto->images->first()->imageFileName) }}"
                         alt="" height=""/>
                @else
                    <img src="{{ url('images/no-img.jpg') }}" alt="" height="250"/>
                @endif
            </div>

            <div class="thumbs">
                @if( count($produto->images) )
                    @foreach($produto->images as $image)
                        <img src="{{ url('uploads/'.$image->imageFileName) }}" alt="" height="15%"/>
                    @endforeach
                @endif
            </div>

        </div>
    </div>

    <div class="col-sm-4">

        @if(count($produto->tags))
            @include('store.partial.tags')
        @endif

        <h2 class="text-center">R$ {{ number_format($produto->price, 2, ',', '.') }}</h2>

        <p class="text-center">
            <a href="{{ route('cart_add',['id'=>$produto->id] ) }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Adicionar no carrinho</a>
        </p>

    </div>

@stop

@section('styles')
    @parent
    <link href="{{ asset('css/stylle.css') }}" rel="stylesheet">
@stop

@section('scripts')
    @parent
    <script>
        ;(function($)
        {
            'use strict';
            $(document).ready(function()
            {
                $(function () {
                    $('.thumbs img').click(function () {
                        var cover = $('.cover img');
                        var thumb = $(this).attr('src');
                        if (cover.attr('src') !== thumb) {
                            cover.fadeTo('200', '0', function () {
                                cover.attr('src', thumb);
                                cover.fadeTo('150', '1');
                            });
                        }
                        $('.thumbs img').removeClass('active');
                        $(this).addClass('active');
                    });
                });
            });
        })(window.jQuery);
    </script>
@stop